<?php

use App\Models\Cities;
use App\Models\Company;
use App\Models\Countries;
use App\Models\Departments;
use App\Models\Designations;
use App\Models\SalaryStructures;
use App\Models\States;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Countries::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(States::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Cities::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Departments::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Designations::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(SalaryStructures::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('personal_number');
            $table->string('address');
            $table->timestamp('date_birth')->nullable();
            $table->timestamp('date_hired')->nullable();
            $table->timestamp('date_fired')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
