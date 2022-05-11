<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Middleware to enable authentication 
     *
     * @return null
     */
    public function __construct()
    {
        // Middleware only applied to these methods
        $this->middleware('auth', [ 
          'only' => [
            'create',
            'store',
            'edit',
            'update',
            'destroy'
          ]
        ]);
    }

    /**
     * Show the index page with all posts
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('posts.index');
    }

    /**
     * Show the form for creating a new post
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('posts.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
      $data = $request->validate([
        'title' => 'required|unique:posts,title|max:255|string',
        'content' => 'required|string',
      ]);

      $post = Post::firstOrNew([
        'title' => $data['title'],
        'content' => $data['content'],
        'user_id' => Auth::user()->id
      ]);

      $post->save();
      
      return Redirect::to('/posts/'.$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [ 'post' => $post ]);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      if($post->user->id !== Auth::user()->id){
        return Redirect::to('/posts/'.$post->id);
      }

      return view('posts.edit', [ 'post' => $post]);
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $data = $request->validate([
        'title' => 'required|max:255|string',
        'content' => 'required|string',
      ]);

      $post->title = $data['title'];
      $post->content = $data['content'];
      $post->save();

      return Redirect::to('/posts/'.$post->id);
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      $post->delete();

      return Redirect::route('posts.index');
    }
}
