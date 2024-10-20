<?php

namespace App\Models;

use App\Traits\EnsureCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class States extends Model
{
    use EnsureCompany, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state_code',
        'name',
        'countries_id',
        'company_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'countries_id' => 'integer',
        'company_id' => 'integer',
    ];

    public function countries(): BelongsTo
    {
        return $this->belongsTo(Countries::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function cities(): HasMany
    {
        return $this->hasMany(Cities::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
