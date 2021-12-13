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
            $table->text("slug")->unique();
            $table->text("details");
            $table->longText("description")->nullable();
            $table->float("price");
            $table->integer("stock");
            $table->json("required_media_options")->nullable();
            $table->boolean("featured")->default(0);
            $table->boolean("popular")->default(0);
            $table->boolean("active")->default(0);
            $table->string("promotion_label")->nullable();
            $table->text("meta_title")->nullable();
            $table->text("meta_description")->nullable();
            $table->text("meta_keywords")->nullable();
            $table->foreignId("category_id")->nullable()->constrained()->onDelete("set null")->onUpdate("cascade");
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
