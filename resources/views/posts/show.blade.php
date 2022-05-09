<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> {{ $post->title }} | Laravel Blog</title>

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 max-h-screen">
    <div class="max-w-2xl mx-auto flex flex-col min-h-screen">

      <h1 class="text-black text-6xl font-bold mt-16">{{ Str::ucfirst($post->title) }}</h1>

      <div class="flex flex-row mt-6">
        <h3 class="text-base text-gray-600 inline-block">Created on {{ $post->created_at }}</h3>

        @if ($post->updated_at > $post->created_at)
          <h3 class="text-base text-gray-600 inline-block ml-4">Updated on {{ $post->updated_at }}</h3>
        @endif        
      </div>

      <p class="mt-12 text-gray-800"> {{ Str::ucfirst($post->content)  }}</p>

      <a href="/posts" class="mt-20 text-gray-800 border-2 border-gray-600 hover:shadow-md hover:border-black hover:text-black py-4 px-6 rounded-lg max-w-fit font-medium transition-all duration-150">
        <span class="relative top-[2px]">Back to posts</span>

        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 relative inline-block w-7 h-7" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
        </svg>
      </a>
      
      <h3 class="mt-20 font-semibold text-3xl">About the Author</h3>
      <div class="flex flex-row justify-between mt-6">

        <div class="flex flex-row items-center">
          <img class="h-10 w-10 rounded-full" src="https://www.pngitem.com/pimgs/m/4-40070_user-staff-man-profile-user-account-icon-jpg.png" alt="">
          <p class="inline-block h-min text-xl ml-4 relative">{{ Str::ucfirst($post->user->name) }}</p>
        </div>

        @if (Auth::user() == $post->user)
          <a href="/posts/{{ $post->id }}/edit" class="text-gray-800 border-2 border-gray-600 hover:shadow-md hover:border-black hover:text-black py-3 px-6 rounded-lg max-w-fit font-medium transition-all duration-150">
            <span class="relative top-[3px]">Edit</span>

            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 relative inline-block w-6 h-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
              <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
              <line x1="16" y1="5" x2="19" y2="8" />
            </svg>
          </a>
        @else
          <p class="text-gray-800 h-min self-center w-28 text-right leading-5 italic">You can't edit this post...</p>
        @endif

      </div>

    </div>
  </div>
</body>
</html>