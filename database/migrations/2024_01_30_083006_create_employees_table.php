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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('username')->unique();
            // $table->string('email');
            // $table->string('password');
            $table->date('joining_date');
            // $table->string('joining_date',15);
            $table->string('mobile_no',30);
            $table->string('status',30);
            $table->string('employment_status',30);
            $table->foreignId('company_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('department_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('designation_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('reports_to')->nullable()->constrained('employees')->onUpdate('cascade')->onDelete('set null');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
