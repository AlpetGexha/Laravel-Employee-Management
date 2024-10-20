<?php

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_project', function (Blueprint $table) {
            $table->foreignIdFor(Employee::class);
            $table->foreignIdFor(Project::class);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_project');
    }
};
