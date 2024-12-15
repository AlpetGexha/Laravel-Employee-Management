<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;

enum Status: string implements HasColor
{
    case Pending = 'pending';
    case InProgress = 'in_progress';
    case Completed = 'completed';
    case Canceled = 'canceled';

    function getColor(): string|array|null
    {
        return match ($this) {
            self::Pending => 'gray',
            self::InProgress => 'warning',
            self::Completed => 'success',
            self::Canceled => 'danger',
        };
    }
}



