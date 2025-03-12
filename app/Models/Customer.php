<?php

namespace App\Models;

use App\Traits\EnsureCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory, EnsureCompany;

    protected $fillable = [
        'company_id',
        'name',
        'email'
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
