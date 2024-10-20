<?php

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('p_t_o_s', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Employee::class)->constrained()->cascadeOnDelete();
            $table->dateTime('from_date');
            $table->dateTime('to_date');
            $table->string('days')->nullable();
            $table->string('leave_type')->nullable();
            $table->string('reason')->nullable();
            $table->string('is_approved')->default('Pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('p_t_o_s');
    }
};
