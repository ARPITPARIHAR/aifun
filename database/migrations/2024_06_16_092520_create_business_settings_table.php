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
        Schema::create('business_settings', function (Blueprint $table) {
            $table->id();
            $table->string('business_name',250);
            $table->string('email',250)->nullable();
            $table->string('contact_numbers',250)->nullable();
            $table->text('address')->nullable();
            $table->text('country')->nullable();
            $table->text('state')->nullable();
            $table->text('city')->nullable();
            $table->text('postel_code')->nullable();
            $table->string('facebook',250)->nullable();
            $table->string('instagram',250)->nullable();
            $table->string('whatsapp',250)->nullable();
            $table->string('linked_in',250)->nullable();
            $table->string('twitter',250)->nullable();
            $table->text('brief_description')->nullable();
            $table->text('google_map')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_settings');
    }
};
