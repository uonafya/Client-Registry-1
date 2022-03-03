<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Patient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            //$table->foreignId('patient_category_id')->constrained();
            $table->string('DOB')->unique();            
            $table->string('gender')->unique()->nullable(); 
            $table->string('Geolocation')->unique();  
            $table->string('Phone')->unique();   
            $table->string('ID_Number')->unique();   
            $table->string('CCC_Number')->unique();   
            $table->string('Nemis')->unique();   
            $table->unsignedBigInteger('Link_facility')->unique()->nullable();   
            $table->string('Resident')->unique();   
            $table->string('Date_of_Transfer')->unique()->nullable();            
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            
            $table->foreign('Link_facility')->references('id')->on('facilities')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
