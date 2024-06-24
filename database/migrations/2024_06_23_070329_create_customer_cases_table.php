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
        Schema::create('customer_cases', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->index();
            $table->string('title');
            $table->double('fee')->default(0.00);
            $table->longText('description');
            $table->enum('status', ['register', 'in_progress', 'waiting', 'approved', 'done'])->default('register');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_cases');
    }
};