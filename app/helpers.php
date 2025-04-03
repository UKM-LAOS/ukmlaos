<?php 

use App\Models\Discount;
use App\Models\CourseStudent;
use Illuminate\Support\Facades\Auth;
use App\Enums\Discount\TipeDiskonEnum;
use App\Http\Controllers\API\ResponseFormatterController;
function checkDiskon(Discount $diskon): bool
{
    // Periksa apakah diskon sudah kadaluarsa (jika tipe_diskon = dibatasi_tanggal)
    if ($diskon->tipe_diskon == TipeDiskonEnum::DIBATASI_TANGGAL && $diskon->tanggal_kadaluarsa && now() > $diskon->tanggal_kadaluarsa) {
        return false;
    }
    
    // Periksa apakah diskon sudah mencapai batas penggunaan (jika tipe_diskon = dibatasi_kuota)
    if ($diskon->tipe_diskon == TipeDiskonEnum::DIBATASI_KUOTA && $diskon->batas_penggunaan) {
        $jumlah_penggunaan = $diskon->transactions()->count();
        
        if ($jumlah_penggunaan >= $diskon->batas_penggunaan) {
            return false;
        }
    }

    return true;
}

function checkIsRegistered($course)
{
    return CourseStudent::whereCourseId($course->id)->whereStudentId(Auth::user()->id)->exists();
}

function checkIfCourseIsCreatedByUser($course)
{
    return in_array(Auth::user()->id, $course->courseMentors->pluck('id')->toArray());
}
?>