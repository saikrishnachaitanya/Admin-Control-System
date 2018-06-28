<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id');
            $table->string('product_description',256);
            $table->string('hsn_code',64);
            $table->string('uom',64);
            $table->string('qty',32);
            $table->integer('rate');
            $table->float('amount');
            $table->float('discount');
            $table->float('taxable_value');
            $table->float('cgst_rate');
            $table->float('cgst_amount');
            $table->float('sgst_rate');
            $table->float('sgst_amount');
            $table->float('total');
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
        Schema::dropIfExists('invoice_items');
    }
}
