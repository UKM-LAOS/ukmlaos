<?php

namespace App\Http\Controllers\Course\Back;

use App\Enums\Transaction\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class MyOrdersController extends Controller
{
    public $title = 'My Orders';

    public function index()
    {
        return view('pages.course.back.my-orders.index', [
            'title' => $this->title,
            'transactions' => Transaction::with(['courseStudent.course'])->whereStudentId(auth()->id())->latest()->limit(3)->get()
        ]);
    }
}
