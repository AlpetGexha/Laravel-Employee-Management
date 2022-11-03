<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees', function () {
    return DB::table('employees')
        ->join('countries', 'employees.country_id', '=', 'countries.id')
        ->join('states', 'employees.state_id', '=', 'states.id')
        ->join('cities', 'employees.city_id', '=', 'cities.id')
        ->join('departaments', 'employees.departament_id', '=', 'departaments.id')
        ->select(
            'employees.id',
            'employees.first_name',
            'employees.last_name',
            'employees.address',
            'employees.zip_code',
            'employees.date_birth',
            'employees.date_hired',
            'countries.name as country',
            'states.name as state',
            'cities.name as city',
            'departaments.name as departament',
            'employees.email',
            'employees.phone',
            'employees.personal_number',
        )
        ->get();
});
