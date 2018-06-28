<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tin_number',64)->nullable();
            $table->string('cin',128)->nullable();
            $table->string('pan_number',64)->nullable();
            $table->string('service_tax_number',128)->nullable();
            $table->string('gstin')->nullable();

            $table->string('reverse_charge',32)->nullable();
            $table->string('invoice_number',32);
            $table->date('invoice_date');
            $table->integer('invoice_state_id');
            $table->integer('invoice_city_id');
           

            $table->string('transportation_moc',64)->nullable();
            $table->string('vehicle_number',32)->nullable();
            $table->date('date_of_supply')->nullable();
            $table->string('place_of_supply',64)->nullable();

            $table->string('billed_name',64)->nullable();
            $table->string('billed_door_number',32)->nullable();
            $table->string('billed_street_name',64);
            $table->string('billed_area',64);
            $table->integer('billed_state_id');
            $table->integer('billed_city_id');
            $table->integer('billed_pin_code');
            $table->integer('billed_phone_number')->nullable();
            $table->string('billed_gstin',64)->nullable();
           
            

            $table->string('shipped_name',64)->nullable();
            $table->string('shipped_door_number',32)->nullable();
            $table->string('shipped_street_name',64)->nullable();
            $table->string('shipped_area',64);
            $table->integer('shipped_city_id');
            $table->integer('shipped_state_id');
            $table->integer('shipped_pin_code');
            $table->integer('shipped_phone_number')->nullable();
            $table->string('shipped_gstin',64)->nullable();
           

            $table->string('bank_name',128);
            $table->string('bank_ac_number',64);
            $table->string('bank_ifsc',32);
            $table->float('total_amount_before_tax');
            $table->float('add_cgst_price')->nullable();
            $table->float('add_cgst_percentage')->nullable();
            $table->float('add_sgst_price')->nullable();
            $table->float('add_sgst_percentage')->nullable();
            $table->float('add_cess_price')->nullable();
            $table->float('add_cess_percentage')->nullable();
            $table->float('total_tax_amount')->nullable();
            $table->float('total_amount_after_tax');
            $table->float('gst_reverse_charge')->nullable();
            
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
        Schema::dropIfExists('invoices');
    }
}
