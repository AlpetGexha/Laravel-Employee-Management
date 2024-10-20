<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait EnsureCompany
{
    public static function bootEnsureCompany(): void
    {
        //         if (auth()->check()) {

//        this is only when we are using the compaby tenlet
//        static::addGlobalScope(new \App\Models\Scopes\EnsureCompany);

        static::creating(function ($model) {
            $model->company_id = 1;
        });
        // }
    }

    public function scopeEnsureCompany(Builder $query): Builder
    {
        // if (auth()->check()) {
        return $query->where('company_id', auth()->user()->current_company_id);
        // }
    }

    public function isOnSameCompany(): bool
    {
        // if (auth()->check()) {
        return $this->company_id === auth()->user()->current_company_id;
        // }
    }
}
