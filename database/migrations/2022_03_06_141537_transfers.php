<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transfers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('dob') ;
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('id_no')->nullable();
            $table->string('CCC_Number')->nullable() ;
            $table->string('Nemis')->nullable();
            $table->string('Resident')->nullable();
            $table->unsignedBigInteger('facility_id')->nullable();
            $table->integer('transferstatus')->default(0);
            $table->unsignedBigInteger('ifacility')->nullable();
            $table->string('rtransfer')->nullable();
            $table->integer('void') ->default(0);
            $table->string('transferred_by')->nullable();
            $table->timestamps();

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
