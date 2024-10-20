<?php

use App\Models\Company;
use App\Models\Countries;
use App\Models\States;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class)->constrained()->cascadeOnDelete();
            //            $table->foreignIdFor(Countries::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(States::class)->constrained();
            $table->string('name');
            $table->string('city_code')->nullable();
            $table->string('zip_code')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
