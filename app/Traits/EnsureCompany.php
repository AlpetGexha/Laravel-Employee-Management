<?php

namespace App\Traits;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait EnsureCompany
{
    public static function bootEnsureCompany(): void
    {
                if (auth()->check()) {

        //        this is only when we are using the compaby tenlet
        //        static::addGlobalScope(new \App\Models\Scopes\EnsureCompany);

        static::creating(function ($model): void {
            if ($model->company_id === null) {
                $model->company_id = auth()->user()->current_company_id;
            }
        });

        }
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeEnsureCompany(Builder $query): Builder
    {
        //        if (auth()->check()) {
        return $query->where('company_id', auth()->user()->current_company_id);
        //        }
    }

    public function isOnSameCompany(): bool
    {
        // if (auth()->check()) {
        return $this->company_id === auth()->user()->current_company_id;
        // }
    }
}
