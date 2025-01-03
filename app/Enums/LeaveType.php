<?php

namespace App\Enums;

enum LeaveType: string
{
    case VACATION = 'Vacation';
    case SICK = 'Sick';
    case PERSONAL = 'Personal';
    case UNPAID = 'Unpaid';
    case BEREAVEMENT = 'Bereavement';
    case JURY_DUTY = 'Jury Duty';
    case SABBATICAL = 'Sabbatical';
    case PATERNITY = 'Paternity';

    public static function toArray(): array
    {
        return [
            self::VACATION->value => 'Vacation',
            self::SICK->value => 'Sick',
            self::PERSONAL->value => 'Personal',
            self::UNPAID->value => 'Unpaid',
            self::BEREAVEMENT->value => 'Bereavement',
            self::JURY_DUTY->value => 'Jury Duty',
            self::SABBATICAL->value => 'Sabbatical',
            self::PATERNITY->value => 'Paternity',
        ];
    }
}
