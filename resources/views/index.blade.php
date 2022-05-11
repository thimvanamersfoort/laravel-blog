<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | Laravel Blog</title>

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 max-h-screen">
    <div class="max-w-2xl mx-auto flex flex-col min-h-screen">

      <h1 class="text-black text-6xl font-bold mt-16">
        Hello 
        @if (Auth::user() && Auth::user()->first_name !== '')
          {{ Auth::user()->first_name }}
        @elseif (Auth::user())
          {{ Auth::user()->name }}
        @else
          Guest
        @endif
        
      </h1>

      <p class="text-gray-900 mt-6 text-lg">
        Welcome to my small blog, made in Laravel. This is a personal project, which is made
        to help me understand the Laravel Framework better. Features of this website:
      </p>

      <ul class="text-gray-900 mt-8 text-lg list-disc list-inside space-y-3 font-semibold leading-6">
        <li>Named <code class="bg-gray-300 px-1 text-gray-700 rounded-sm">/posts</code> resource routes with included Auth middleware.</li>
        <li>Eloquent Database Models + One-To-Many Relationship linking.</li>
        <li>Laravel default User Authentication, stored in session state.</li>
        <li>Form input validation and HTML character escaping, to prevent XSS attacks.</li>
        <li>Makes use of MySQL, only run <code class="bg-gray-300 px-1 text-gray-700 rounded-sm">php artisan migrate</code> to configure the database.</li>
        <li>Included Laravel Telescope at <code class="bg-gray-300 px-1 text-gray-700 rounded-sm">/telescope</code> for debugging purposes.</li>
        <li>Custom User Icons using <a href="https://avatars.dicebear.com/" target="_blank" class="underline">DiceBear Avatars</a>.</li>
      </ul>

      <div>
        @if (Auth::user())
          <a href="/logout" class="text-center inline-block font-semibold py-4 px-4 text-black bg-white rounded-xl border border-black max-w-max transition-all duration-200 mt-8 focus:bg-black focus:text-white hover:bg-black hover:text-white">Log out as {{ Auth::user()->name }}</a>
        @else
          <a href="/login" class="text-center inline-block font-semibold py-4 px-4 text-black bg-white rounded-xl border border-black max-w-max transition-all duration-200 mt-8 focus:bg-black focus:text-white hover:bg-black hover:text-white">Log in</a>
        @endif

        <a href="/posts" class="ml-2 text-center inline-block font-semibold py-4 px-4 text-black bg-white rounded-xl border border-black max-w-max transition-all duration-200 mt-8 focus:bg-black focus:text-white hover:bg-black hover:text-white">See posts</a>
      </div>

      <a href="https://github.com/thimvanamersfoort/laravel-blog" target="_blank" class="text-center inline-block font-semibold py-6 px-10 text-white bg-black rounded-3xl border border-black max-w-max transition-all duration-200 my-16 focus:bg-white focus:text-black hover:bg-white hover:text-black">
        Github
        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 relative inline-block w-6 h-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
        </svg>
      </a>

      <div class="mt-auto mb-[5vh]">
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
          <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
            <dt class="text-sm font-medium text-gray-500 truncate">Total visits in session</dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $visits }}</dd>
          </div>
      
          <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
            <dt class="text-sm font-medium text-gray-500 truncate">IP address</dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $ip }}</dd>
          </div>
      
          <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
            <dt class="text-sm font-medium text-gray-500 truncate">Path</dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $path }}</dd>
          </div>
        </dl>
      </div>

    </div>
  </div>
</body>
</html>