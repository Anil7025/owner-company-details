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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name')->nullable();
            $table->string('owner_email')->nullable();
            $table->string('designation')->nullable();
            // $table->string('business_name')->nullable();
            $table->string('business_cat')->nullable();
            $table->string('owner_phone')->nullable();
            $table->string('location')->nullable();
            $table->string('owner_image')->nullable(); // for dropify image

            // Company Info
            $table->string('company_name')->nullable();
            // $table->string('company_email')->nullable();
            $table->string('company_gst')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_address')->nullable();
            $table->string('video')->nullable();
            $table->string('company_logo')->nullable(); // for logo

            // Description and Media
            $table->text('description')->nullable();
            $table->string('facebook')->nullable(); 
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('company_image')->nullable(); // for myDropify2
            $table->tinyInteger('status')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
