<?php

namespace App\Enums\Course;

enum KategoriEnum: string
{
    case PROGRAMMING = 'programming';
    case CYBER_SECURITY = 'cyber-security';
    case DESIGN = 'design';
    case DIGITAL_MARKETING = 'digital-marketing';

    public function label(): string
    {
        return match ($this) {
            self::PROGRAMMING => 'Programming',
            self::CYBER_SECURITY => 'Cyber Security',
            self::DESIGN => 'Design',
            self::DIGITAL_MARKETING => 'Digital Marketing',
        };
    }
}
