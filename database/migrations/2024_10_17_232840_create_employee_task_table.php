<?php

use App\Models\Employee;
use App\Models\Task;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_task', function (Blueprint $table) {
            $table->foreignId(Employee::class);
            $table->foreignId(Task::class);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_task');
    }
};
