<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("address_name");
            $table->string("address_phone");
            $table->string("address_email");
            $table->string("address_city");
            $table->string("address_zip");
            $table->string("address_line");
            $table->float("subtotal");
            $table->float("discount_price")->default(0.00);
            $table->float("dealer_discount_price")->default(0.00);
            $table->string("coupon_code")->nullable();
            $table->float("delivery_price");
            $table->float("tax_price");
            $table->float("total");
            $table->enum("status", ["pending", "processing", "shipped", "delivered", "cancelled", "failed"])->default("pending");
            $table->enum("payment_mode", ["cash", "credit_card"]);
            $table->boolean("paid")->default(0);
            $table->text("additional_information")->nullable();
            $table->foreignId("user_id")->nullable()->constrained()->onDelete("set null")->onUpdate("cascade");
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
        Schema::dropIfExists('orders');
    }
}
