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
        // Schema::create('users', function (Blueprint $table) {
        //     $table->uuid('id')->primary()->nullable();
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->string('password');
        //     $table->enum('role',['admin','employee','client']);
        //     // $table->foreignId('created_by')->constrained('users');
        //     $table->foreignId('created_by')->constrained('users');
        //     $table->foreignId('updated_by')->constrained('users');
        //     $table->timestamps();
        //     // $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        // });

        // Schema::create('users',function(Blueprint $table){
        //     $table->id('id')->primary();
        //     $table->string('name');
        //     $table->foreignId('user_id')
        //         ->constrained()
        //         ->onDelete('cascade')
        //         ->onUpdate('cascade');
        // });


        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'employee', 'client']);
            $table->timestamps(); // This adds 'created_at' and 'updated_at' columns

            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->cascadeOnDelete();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
