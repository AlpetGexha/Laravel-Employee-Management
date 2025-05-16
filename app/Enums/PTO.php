<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;

enum PTO: string implements HasColor
{
    case Pending = 'Pending';
    case Approved = 'Approved';
    case Rejected = 'Rejected';

    public static function toArray(): array
    {
        return [
            self::Pending->value => 'Pending',
            self::Approved->value => 'Approved',
            self::Rejected->value => 'Rejected',
        ];
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Pending => 'primary',
            self::Approved => 'success',
            self::Rejected => 'danger',
        };
    }
}
