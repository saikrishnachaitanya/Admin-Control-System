<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMobileNumberStringToInvoicesDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices_detail', function (Blueprint $table) {
            $table->string('billed_phone_number',15)->nullable()->change();
            $table->string('shipped_phone_number',15)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices_detail', function (Blueprint $table) {
            $table->dropColumn('billed_phone_number');
            $table->dropColumn('shipped_phone_number');
            
        });
    }
}
