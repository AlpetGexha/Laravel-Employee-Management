<?php

namespace App\Models;

use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Wallo\FilamentCompanies\Company as FilamentCompaniesCompany;
use Wallo\FilamentCompanies\Events\CompanyCreated;
use Wallo\FilamentCompanies\Events\CompanyDeleted;
use Wallo\FilamentCompanies\Events\CompanyUpdated;

class Company extends FilamentCompaniesCompany implements HasAvatar
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'personal_company',
    ];

    /**
     * The event map for the model.
     *
     * @var array<string, class-string>
     */
    protected $dispatchesEvents = [
        'created' => CompanyCreated::class,
        'updated' => CompanyUpdated::class,
        'deleted' => CompanyDeleted::class,
    ];

    public function getFilamentAvatarUrl(): string
    {
        return $this->owner->profile_photo_url;
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function rfids(): HasMany
    {
        return $this->hasMany(Rfid::class);
    }

    public function employeeships(): HasMany
    {
        return $this->hasMany(Employeeship::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendances::class);
    }

    public function designations(): HasMany
    {
        return $this->hasMany(Designations::class);
    }

    public function payrolls(): HasMany
    {
        return $this->hasMany(Payroll::class);
    }

    public function pto(): HasMany
    {
        return $this->hasMany(PTO::class);
    }


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'personal_company' => 'boolean',
        ];
    }
}
