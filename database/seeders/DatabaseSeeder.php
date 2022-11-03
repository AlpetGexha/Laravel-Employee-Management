<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Departament::factory(15)->create();
        \App\Models\Country::factory(15)->create();
        \App\Models\State::factory(15)->create();
        \App\Models\City::factory(15)->create();
        \App\Models\Employee::factory(50)->create();


        $this->call([
            UserSeeder::class
        ]);
    }
}
