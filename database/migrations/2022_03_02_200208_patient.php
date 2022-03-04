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
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('dob');
            $table->string('gender')->nullable();
            $table->string('county')->nullable() ;
            $table->string('phone') ;
            $table->string('id_no') ;
            $table->string('cccno')->nullable() ;
            $table->string('nemis') ;
            $table->Boolean('void')->nullable() ;
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->unsignedBigInteger('facility')->nullable();
            $table->string('residence')->nullable();
            $table->integer('transferin')->default(0);
            $table->string('enddate') ->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('patient_category_id');
            $table->timestamps();
            
            $table->foreign('patient_category_id')->references('id')->on('patient_categories')->onUpdate('cascade');
            $table->foreign('facility')->references('id')->on('facilities')->onDelete('cascade')->onUpdate('cascade');
            
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
