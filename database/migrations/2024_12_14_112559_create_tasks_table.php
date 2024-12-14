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
            $table->uuid('id')->primary(); // Primary key as UUID
            $table->string('name'); // Task name
            $table->text('description')->nullable(); // Description, nullable
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending'); // Enum for status
            $table->uuid('project_id'); // Foreign key to projects table
            $table->uuid('assigned_to')->nullable(); // Foreign key to users table, nullable
            $table->date('start_date')->nullable(); // Start date
            $table->date('end_date')->nullable(); // End date
            $table->uuid('created_by'); // Foreign key to users table
            $table->uuid('updated_by'); // Foreign key to users table
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraints
            $table->foreign('project_id')->references('id')->on('projects')->cascadeOnDelete();
            $table->foreign('assigned_to')->references('id')->on('users')->nullOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->cascadeOnDelete();
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
