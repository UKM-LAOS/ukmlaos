<?php

namespace App\Contracts;

use App\Models\Course;
use App\Models\Transaction;

interface PaymentInterface
{
    public function pay(Course $course, $diskon = null): string;
}
