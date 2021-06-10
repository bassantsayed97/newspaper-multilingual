<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsEnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql1')->create('posts_en', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("body");
            $table->unsignedBigInteger('posts_id')->nullable();
           
            $table->foreign('posts_id')-> references('id')
                ->on('begroup.posts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('posts_en');
    }
}