<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
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
          $table->bigIncrements('postId');
          $table->string('title', 100);
          $table->longText('content');
          $table->string('author', 100);
          $table->timestamps();
          
          Log::info('Created table posts');
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
        //

        Schema::dropIfExists('posts');
        Log::info('Deleted table posts');
    }
}
