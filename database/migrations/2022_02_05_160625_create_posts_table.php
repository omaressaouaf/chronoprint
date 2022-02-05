<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug")->nullable()->unique();
            $table->text("excerpt");
            $table->longText("body");
            $table->text("image");
            $table->boolean("popular")->default(0);
            $table->boolean("active")->default(0);
            $table->text("seo_title")->nullable();
            $table->text("meta_description")->nullable();
            $table->text("meta_keywords")->nullable();
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
        Schema::dropIfExists('posts');
    }
}
