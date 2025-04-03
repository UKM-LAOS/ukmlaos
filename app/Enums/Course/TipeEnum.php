<?php

namespace App\Enums\Course;

enum TipeEnum: string
{
    case FREE = 'free';
    case PREMIUM = 'premium';

    public function label(): string
    {
        return match ($this) {
            self::FREE => 'Free',
            self::PREMIUM => 'Premium',
        };
    }
}
