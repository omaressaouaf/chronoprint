<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text("title");
            $table->string("slug")->nullable()->unique();
            $table->text("details");
            $table->longText("description")->nullable();
            $table->float("design_price")->nullable();
            $table->json("allowed_quantities");
            $table->boolean("popular")->default(0);
            $table->boolean("active")->default(0);
            $table->string("promotion_label")->nullable();
            $table->text("seo_title")->nullable();
            $table->text("meta_description")->nullable();
            $table->text("meta_keywords")->nullable();
            $table->foreignId("category_id")->nullable()->constrained()->onDelete("set null")->onUpdate("cascade");
            $table->text("images")->nullable();
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
        Schema::dropIfExists('products');
    }
}
