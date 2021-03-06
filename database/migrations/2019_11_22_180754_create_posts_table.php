<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
   
    public function up()
    {

        Schema::create("posts", function (Blueprint $table) {
            $table->increments("id");
            $table->text("title")->nullable();
            $table->text("url")->nullable();
            $table->text("content")->nullable();
            $table->text("image")->nullable();
            $table->enum("posted", ["si","no"])->default("no");             
            $table->integer("category_id")->unsigned()->nullable();
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("categories");
        });

    }

    public function down()
    {

        Schema::dropIfExists("posts");

    }
    
}