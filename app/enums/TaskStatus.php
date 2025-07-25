<?php

namespace App\Enums;

enum TaskStatus: string
{
    case OPEN = 'open';
    case CLOSED = 'closed';
    case IN_PROGRESS = 'in progress';
    case BLOCKED = 'blocked';
    case CANCELLED = 'cancelled';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::OPEN => 'Open',
            self::CLOSED => 'Closed',
            self::IN_PROGRESS => 'In Progress',
            self::BLOCKED => 'Blocked',
            self::CANCELLED => 'Cancelled',
            self::COMPLETED => 'Completed',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function color(): string
    {
        return match ($this) {
            self::OPEN => 'primary',
            self::CLOSED => 'success',
            self::IN_PROGRESS => 'warning',
            self::BLOCKED => 'danger',
            self::CANCELLED => 'danger',
            self::COMPLETED => 'success',
        };
    }
}
