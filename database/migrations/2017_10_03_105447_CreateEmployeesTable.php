<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',64);
            $table->string('last_name',64)->nullable();
            $table->string('email');
            $table->string('phone_number',15);
            $table->string('pancard',32);
            $table->string('alternative_phone_number',15)->nullable();
            $table->string('father_name',128);
            $table->string('mother_name',128);
            $table->date('dob');
            $table->string('gender',32);
            //------ Permanent Address ---------------
            $table->string('per_door_number',32)->nullable();
            $table->string('per_street_name',128)->nullable();
            $table->string('per_area',128)->nullable();
            $table->integer('per_city_id')->nullable();
            $table->integer('per_state_id')->nullable();
            $table->integer('per_country_id')->nullable();
            //------ Current Address ---------------
            $table->string('cur_door_number',32)->nullable();
            $table->string('cur_street_name',128)->nullable();
            $table->string('cur_area',128)->nullable();
            $table->integer('cur_city_id')->nullable();
            $table->integer('cur_state_id')->nullable();
            $table->integer('cur_country_id')->nullable();
            //------ Qualification Details ---------------
            $table->string('highest_qualification',128)->nullable();
            $table->string('company_name',128)->nullable();
            $table->string('designation',128)->nullable();
            $table->string('skills',256)->nullable();
            $table->date('doj')->nullable();
            $table->integer('exp_year')->nullable();
            $table->integer('exp_month')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
