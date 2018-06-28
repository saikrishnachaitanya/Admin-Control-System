<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',64);
            $table->string('address',256);
            $table->string('mobile_number',12)->nullable();
            $table->string('gst_uin',32);
            $table->string('state',64);
            $table->string('state_code');
            $table->string('reverse_charge',32)->nullable();
            $table->string('voucher_number',32)->nullable();
            $table->date('voucher_date')->nullable();
            $table->string('place_supply',128)->nullable();
            $table->string('ro_number',128)->nullable();
            $table->string('chasis_number',128)->nullable();
            $table->string('registration_number',128)->nullable();
            $table->string('cash_cheque',64)->nullable();
            $table->string('bank_details',128)->nullable();
            $table->string('cheque_no',128);
            $table->string('product_description',256)->nullable();
            $table->string('hsn_code',64)->nullable();
            $table->string('taxable_value',128);
            $table->float('sgst_rate')->nullable();
            $table->float('sgst_amount')->nullable();
            $table->float('cgst_rate')->nullable();
            $table->float('cgst_amount')->nullable();
            $table->float('igst_rate')->nullable();
            $table->float('igst_amount')->nullable();
            $table->float('total_amount');
            $table->string('mode_payment',128);
            $table->float('advance_amount');
            $table->string('payment_details',256);
            $table->string('amount_words',128);
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
        Schema::dropIfExists('receipts');
    }
}
