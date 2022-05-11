<?php

use App\Models\Post;
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

        $post = new Post();
        $post->title = 'Hello World';
        $post->content = 'Welcome to this simple Laravel Blog, powered by TailwindCSS.'. PHP_EOL .
        'Made by Thim van A'. PHP_EOL . PHP_EOL .
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex fugiat esse blanditiis aperiam veritatis commodi tenetur nam reprehenderit voluptatibus dolorum mollitia, quae vitae consequatur tempora incidunt tempore repudiandae placeat nihil laboriosam? Quaerat, quasi ad vero laudantium, fugit quia ut odit nam reiciendis itaque consectetur, recusandae debitis rem aut nesciunt neque!';
        $post->user_id = 1;
        $post->save();

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
