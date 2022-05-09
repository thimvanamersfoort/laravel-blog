<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Create new post | Laravel Blog</title>

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 max-h-screen">
    <div class="max-w-2xl mx-auto flex flex-col min-h-screen">

      <h1 class="text-black text-6xl font-bold mt-16">Create a new post</h1>

      <form action="/posts" method="post" class="space-y-8 mt-12">
        @csrf

        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 sm:w-[80%]">
          <label for="title" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Title</label>
          <input type="text" name="title" id="title" class="block border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Title of your blogpost">
        </div>

        <div class="relative">
          <label for="contents" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Write your story</label>
          <div class="mt-1">
            <textarea rows="5" name="contents" id="contents" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-lg" placeholder="Contents of your blogpost. Text only."></textarea>
          </div>
        </div>

        <div class="flex flex-row items-center px-5 py-3 rounded-lg border-gray-400 border-dashed border max-w-fit">
          <img class="h-10 w-10 rounded-full" src="https://www.pngitem.com/pimgs/m/4-40070_user-staff-man-profile-user-account-icon-jpg.png" alt="">
          <p class="inline-block h-min text-xl ml-4 relative">{{ Str::ucfirst(Auth::user()->name) }}</p>
        </div>

        <div class="">
          <button type="submit" class="text-center inline-block font-semibold py-[0.875rem] px-6 text-white bg-black rounded-xl border border-black max-w-max transition-all duration-200 focus:bg-white focus:text-black hover:bg-white hover:text-black"> 
            Save 
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 relative inline-block w-6 h-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
              <circle cx="12" cy="14" r="2" />
              <polyline points="14 4 14 8 8 8 8 4" />
            </svg>
          </button>
          
          <a href="/posts" class="text-center ml-2 inline-block font-semibold py-[0.875rem] px-6 text-black bg-white rounded-xl border border-black max-w-max transition-all duration-200 focus:bg-black focus:text-white hover:bg-black hover:text-white">
            Discard
  
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 relative inline-block w-6 h-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
            </svg>
          </a>
        </div>
      
      </form>


    </div>
  </div>
</body>
</html>