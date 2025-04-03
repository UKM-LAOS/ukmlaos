<?php

namespace App\Services;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Course;
use App\Models\Discount;
use Midtrans\Notification;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseStudent;
use Illuminate\Support\Facades\DB;
use App\Contracts\PaymentInterface;
use App\Enums\Course\TipeEnum;
use Illuminate\Support\Facades\Log;
use App\Enums\Transaction\StatusEnum;
use App\Http\Controllers\API\ResponseFormatterController;

class MidtransPaymentService implements PaymentInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Config::$is3ds = env('MIDTRANS_IS_3DS');
    }

    private const STATUS_MAPPING = [
        'capture' => [
            'challenge' => 'Menunggu',
            'accept' => 'Sukses',
        ],
        'cancel' => 'Gagal',
        'deny' => 'Gagal',
        'settlement' => 'Sukses',
        'pending' => 'Menunggu',
        'expire' => 'Gagal',
    ];

    public function pay(Course $course, $diskon = null): string
    {
        DB::beginTransaction();
        try
        {
            $enrollStudentToCourse = CourseStudent::create([
                'course_id' => $course->id,
                'student_id' => auth()->id(),
            ]);

            if($course->tipe === TipeEnum::FREE)
            {
                $transaksi = Transaction::create([
                    'order_id' => 'LAOS-' . Str::random(6),
                    'student_id' => auth()->id(),
                    'course_student_id' => $enrollStudentToCourse->id,
                    'discount_id' => $diskon ? $diskon->id : null,
                    'total_harga' => 0,
                    'status' => StatusEnum::SUKSES,
                ]);
    
                DB::commit();
                return ResponseFormatterController::success($transaksi, 'Transaksi berhasil');
            }

            $transaksi = Transaction::create([
                'order_id' => 'LAOS-' . Str::random(6),
                'student_id' => auth()->id(),
                'course_student_id' => $enrollStudentToCourse->id,
                'discount_id' => $diskon ? $diskon->id : null,
                'total_harga' => $diskon ? $course->harga - ($course->harga * $diskon->persentase / 100) + 15000 : $course->harga + 15000,
                'status' => StatusEnum::MENUNGGU,
            ]);

            $itemDetails = [
                'id' => $transaksi->order_id,
                'price' => $transaksi->total_harga,
                'quantity' => 1,
                'name' => "Pembayaran untuk transaksi {$transaksi->order_id}",
            ];
    
            $customerDetails = [
                'first_name' => $transaksi->student->name,
                'email' => $transaksi->student->email,
            ];
    
            $midtransParam = [
                'transaction_details' => [
                    'order_id' => $transaksi->order_id,
                    'gross_amount' => $transaksi->total_harga,
                ],
                'item_details' => [$itemDetails],
                'customer_details' => $customerDetails,
            ];

            DB::commit();
    
            return Snap::getSnapToken($midtransParam);
        }catch(Exception $e)
        {
            Log::error('Midtrans payment error: ' . $e->getMessage());
            return false;
        }
    }

    public function midtransCallback(Request $request)
    {
        DB::beginTransaction();
        try {
            $notif = $request->method() == 'POST' 
                ? new Notification() 
                : Transaction::status($request->order_id);

            $checkout = Transaction::whereOrderId($notif->order_id)->firstOrFail();
            
            $status = self::STATUS_MAPPING[$notif->transaction_status] ?? 'failed';
            if ($notif->transaction_status === 'capture' || $notif->transaction_status === 'cancel') {
                $status = self::STATUS_MAPPING[$notif->transaction_status][$notif->fraud_status] ?? 'failed';
            }

            $checkout->status = $status;
            $checkout->save();

            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Midtrans Callback success',
            ]);
            
        } catch(Exception $e) {
            Log::error('Midtrans callback error: ' . $e->getMessage());
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Midtrans Callback failed',
            ], 500);
        }
    }
}
