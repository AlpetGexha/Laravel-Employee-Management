<?php

namespace App\Enums;

enum PTO: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
}
