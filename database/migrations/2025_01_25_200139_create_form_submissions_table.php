<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact');
            $table->integer('age');
            $table->string('email');
            $table->string('location');
            $table->text('symptoms');
            $table->enum('ambulance_needed', ['yes', 'no']);
            $table->enum('police_needed', ['yes', 'no']);
            $table->longText('advice')->default('none for now');
           
            $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('form_submissions');
    }
};
