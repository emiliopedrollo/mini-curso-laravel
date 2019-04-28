<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('title');
            $table->longText('content');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();

            $table->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::create('comments', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->text('content');
           $table->unsignedBigInteger('post_id');
           $table->unsignedBigInteger('author_id');
           $table->timestamps();

           $table->foreign('post_id')
               ->references('id')
               ->on('posts')
               ->onDelete('cascade');

           $table->foreign('author_id')
               ->references('id')
               ->on('users')
               ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
    }
}
