<?php

namespace App\Models;

use App\Traits\EnsureCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, EnsureCompany;

    protected $fillable = [
        'company_id',
        'name',
        'price',
        'description'
    ];

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}
