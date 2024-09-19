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
        Schema::create('labelprintfrom', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('prefix', 10)->nullable(); // Prefix (e.g., Mr., Mrs., etc.)
            $table->string('name'); // Full name
            $table->string('address')->nullable(); // Address
            $table->string('local_area')->nullable(); // Local area
            $table->string('city')->nullable(); // City
            $table->string('district')->nullable(); // District
            $table->string('state')->nullable(); // State
            $table->string('zip_code', 20)->nullable(); // Zip code
            $table->date('date_of_birth')->nullable(); // Date of birth
            $table->string('partner_name')->nullable(); // Partner's name
            $table->date('anniversary')->nullable(); // Anniversary date
            $table->date('partner_dob')->nullable(); // Partner's date of birth
            $table->json('options')->nullable(); // Additional options (stored as JSON)
            $table->string('contact_person')->nullable(); // Contact person
            $table->string('std_code', 10)->nullable(); // STD code (area code for phone)
            $table->string('office', 20)->nullable(); // Office phone number
            $table->string('office2', 20)->nullable(); // Secondary office phone number
            $table->string('resident', 20)->nullable(); // Resident phone number
            $table->string('fax', 20)->nullable(); // Fax number
            $table->string('mobile_no', 20); // Mobile number
            $table->string('mobile_no2', 20)->nullable(); // Secondary mobile number
            $table->string('email')->nullable(); // Email address
            $table->timestamps(); // Created at and Updated at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labelprintfrom');
    }
};
