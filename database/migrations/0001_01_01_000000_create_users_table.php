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

        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'employee', 'client']);
            $table->timestamps(); 
            $table->foreignUuid('created_by')->nullable()->constant('users')->cascadeOnDelete();
            $table->foreignUuid('updated_by')->nullable()->constant('users')->cascadeOnDelete();

        });



        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->char('user_id', 36)->nullable()->index(); // Define user_id as CHAR(36)
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
