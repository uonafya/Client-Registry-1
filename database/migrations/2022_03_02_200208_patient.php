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
            $table->string('DOB') ;            
            $table->string('gender')->nullable(); 
            $table->string('Geolocation') ;  
            $table->string('Phone') ;   
            $table->string('ID_Number') ;   
            $table->string('CCC_Number') ;   
            $table->string('Nemis') ;   
            $table->unsignedBigInteger('Link_facility') ->nullable();   
            $table->string('Resident') ;   
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
