<?php

namespace App\Models;

use App\Traits\EnsureCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendances extends Model
{
    use EnsureCompany, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'checked_in_at',
        'checked_out_at',
        'late',
        'overtime',
        'employee_id',
        'company_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'checked_in_at' => 'datetime',
        'checked_out_at' => 'datetime',
        'late' => 'datetime',
        'overtime' => 'datetime',
        'user_id' => 'integer',
        'company_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
