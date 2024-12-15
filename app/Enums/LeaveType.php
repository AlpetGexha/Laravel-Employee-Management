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
}
