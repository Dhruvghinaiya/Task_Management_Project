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
        Schema::create('client_details', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Primary key as UUID
            $table->uuid('user_id'); // UUID foreign key for user_id
            $table->string('company_name'); // Company name
            $table->string('contact_number'); // Contact number
            $table->timestamps(); // created_at and updated_at columns
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_details');
    }
};
