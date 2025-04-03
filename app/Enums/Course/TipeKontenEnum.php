<?php

namespace App\Enums\Course;

enum TipeKontenEnum: string
{
    case VIDEO = 'video';
    case TEXT = 'text';

    public function label(): string
    {
        return match ($this) {
            self::VIDEO => 'Video',
            self::TEXT => 'Text',
        };
    }
}
