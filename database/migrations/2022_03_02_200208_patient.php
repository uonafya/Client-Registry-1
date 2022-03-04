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
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('dob') ;            
            $table->string('gender')->nullable(); 
            $table->string('Geolocation')->nullable() ;  
            $table->string('phone')->nullable();   
            $table->string('id_no')->nullable();   
            $table->string('CCC_Number')->nullable() ;   
            $table->string('Nemis')->nullable();   
            $table->Boolean('void')->nullable() ;   
            $table->string('created_by')->nullable();   
            $table->string('updated_by')->nullable(); 
            $table->string('date_updated')->nullable(); 
            $table->string('date_created')->nullable();               
            $table->unsignedBigInteger('Link_facility') ->nullable();   
            $table->string('Resident')->nullable();   
            $table->string('county')->nullable();   
            $table->string('village')->nullable();
            $table->string('Date_of_Transfer') ->nullable();         
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
