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
            $table->string('phone')->nullable();
            $table->string('id_no')->nullable();
            $table->string('CCC_Number')->nullable() ;
            $table->string('Nemis')->nullable();
            $table->Boolean('void')->nullable() ;
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->date('date_updated')->nullable();
            $table->date('date_created')->nullable();
            $table->string('Resident')->nullable();
            $table->string('county')->nullable();
            $table->string('village')->nullable();
            $table->date('dot') ->nullable();
            $table->string('transferred_by')->nullable();
            $table->unsignedBigInteger('facility_id')->nullable();
            $table->integer('transferstatus')->default(0);
            $table->string('facility2') ->nullable();
            $table->string('mflcode2') ->nullable();
            $table->string('enddate') ->nullable();
            $table->timestamp('email_verified_at')->nullable();
            // $table->unsignedBigInteger('patient_category_id');
            $table->timestamps();

            // $table->foreign('patient_category_id')->references('id')->on('patient_categories')->onUpdate('cascade');
            $table->foreign('facility_id')->references('mfl_code')->on('facilities')->onDelete('cascade')->onUpdate('cascade');

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
