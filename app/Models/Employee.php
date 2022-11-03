<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id', 'departament_id', 'city_id', 'state_id', 'first_name', 'last_name', 'address', 'zip_code', 'date_birth', 'date_hired', 'email', 'phone', 'personal_number',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function departament()
    {
        return $this->belongsTo(Departament::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
