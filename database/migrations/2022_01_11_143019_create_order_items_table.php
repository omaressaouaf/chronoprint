<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer("quantity");
            $table->float("subtotal");
            $table->json("selected_options");
            $table->boolean("design_by_company")->default(0);
            $table->text("design_information")->nullable();
            $table->foreignId("order_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("product_id")->constrained()->onDelete("set null")->onUpdate("cascade");
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
        Schema::dropIfExists('order_items');
    }
}
