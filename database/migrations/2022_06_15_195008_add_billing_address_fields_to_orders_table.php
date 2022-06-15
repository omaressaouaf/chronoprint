<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBillingAddressFieldsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->after("address_line", function ($table) {
                $table->string("billing_address_name")->nullable();
                $table->string("billing_address_phone")->nullable();
                $table->string("billing_address_email")->nullable();
                $table->string("billing_address_city")->nullable();
                $table->string("billing_address_zip")->nullable();
                $table->string("billing_address_line")->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
