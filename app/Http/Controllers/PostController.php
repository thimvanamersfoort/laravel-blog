<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Lists all posts
     *
     * @return \Illuminate\Http\Response
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
      // Returns view posts.create


      return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
      // First validate the input
      // Then add it to the database with Post Model
      // Redirect user to the view, using Post ID retrieved from the database
        return Redirect::route('index');
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

      return Redirect::to('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
