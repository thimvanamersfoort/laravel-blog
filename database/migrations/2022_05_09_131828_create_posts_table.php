<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
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

      if(!Schema::hasTable('posts'))
      {
        Schema::create('posts', function(Blueprint $table){
          $table->id();
          $table->string('title');
          $table->longText('content');
          $table->foreignId('user_id');

          // Author
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

          $table->timestamps();

          Log::info('Created Posts table');
        });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Log::info('Deleted Posts table');
    }
}
