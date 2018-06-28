<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('ref_number',128);
            $table->string('name',128);
            $table->string('door_number',32)->nullable();
            $table->string('street_name',128)->nullable();
            $table->string('area',128)->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('phone_number',64)->nullable();
            $table->string('mobile_number',64)->nullable();
            $table->string('description_1',128)->nullable();
            $table->string('description_2',128)->nullable();
            $table->string('description_3',128)->nullable();
            $table->float('ex_showroom_price')->nullable();
            $table->float('life_tax_qtrly_tax')->nullable();
            $table->float('insurance_approx')->nullable();
            $table->float('incidental_&_t_r_charges')->nullable();
            $table->float('extended_warranty')->nullable();
            $table->float('maxicare')->nullable();
            $table->float('total')->nullable();
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
        Schema::dropIfExists('quotation');
       
    }
}
