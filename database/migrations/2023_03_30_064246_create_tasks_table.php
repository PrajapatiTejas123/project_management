<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('planning_hours');
            $table->string('actual_hours');
            $table->string('start_date');
            $table->string('end_date');
            $table->boolean('status');
            $table->string('created_by');
            $table->string('updated_by');
            $table->foreign('project_id')
                  ->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('employee_id')
                  ->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
