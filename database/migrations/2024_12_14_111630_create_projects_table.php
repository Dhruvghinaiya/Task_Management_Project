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
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Primary key as UUID
            $table->string('name'); // Project name
            $table->text('description')->nullable(); // Description, nullable
            $table->uuid('client_id')->nullable(); // Foreign key to users table, nullable
            $table->uuid('created_by'); // Foreign key to users table
            $table->uuid('updated_by'); // Foreign key to users table
            $table->date('start_date')->nullable(); // Start date, nullable
            $table->date('end_date')->nullable(); // End date, nullable
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraints
            $table->foreign('client_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
