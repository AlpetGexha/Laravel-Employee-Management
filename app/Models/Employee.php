<?php

namespace App\Models;

use App\Traits\EnsureCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use EnsureCompany, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'personal_number',
        'address',
        'date_birth',
        'date_hired',
        'date_fired',
        'is_active',
        'company_id',
        'countries_id',
        'states_id',
        'cities_id',
        'departments_id',
        'designations_id',
        'salary_structures_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date_birth' => 'datetime',
        'date_hired' => 'datetime',
        'date_fired' => 'datetime',
        'is_active' => 'boolean',
        'company_id' => 'integer',
        'countries_id' => 'integer',
        'states_id' => 'integer',
        'cities_id' => 'integer',
        'departments_id' => 'integer',
        'designations_id' => 'integer',
        'salary_structures_id' => 'integer',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function countries(): BelongsTo
    {
        return $this->belongsTo(Countries::class);
    }

    public function states(): BelongsTo
    {
        return $this->belongsTo(States::class);
    }

    public function cities(): BelongsTo
    {
        return $this->belongsTo(Cities::class);
    }

    public function departments(): BelongsTo
    {
        return $this->belongsTo(Departments::class);
    }

    public function designations(): BelongsTo
    {
        return $this->belongsTo(Designations::class);
    }

    public function salaryStructures(): BelongsTo
    {
        return $this->belongsTo(SalaryStructures::class);
    }

    public function payrolls(): HasMany
    {
        return $this->hasMany(Payroll::class);
    }

    public function rfid(): HasOne
    {
        return $this->hasOne(Rfid::class);
    }

    public function pto(): HasMany
    {
        return $this->hasMany(PTO::class);
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }
}
