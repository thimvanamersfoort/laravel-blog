<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit: {{ $post->title }} | Laravel Blog</title>

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 max-h-screen">
    <div class="max-w-2xl mx-auto flex flex-col min-h-screen">

      <h1 class="text-black text-6xl font-bold mt-16">Edit <i>'{{ $post->title }}'</i> </h1>

      <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-8 mt-12">
        @csrf
        @method('PUT')

        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 sm:w-[80%]">
          <label for="title" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Title</label>
          <input type="text" name="title" value="{{ $post->title }}" id="title" class="block border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm w-full" placeholder="Title of your blogpost">
        </div>

        <div class="relative">
          <label for="content" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Write your story</label>
          <div class="mt-1">
            <textarea rows="20" name="content" id="content" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-lg" placeholder="content of your blogpost. Text only.">{{ $post->content }}</textarea>
          </div>
        </div>

        <div class="flex flex-row items-center px-5 py-3 rounded-lg border-gray-400 border-dashed border max-w-fit">
          <img class="h-10 w-10 rounded-full" src="https://avatars.dicebear.com/api/initials/{{ substr($post->user->name, 0, 2) }}.svg?background=%23000" alt="">
          <p class="inline-block h-min text-xl ml-4 relative">{{ Str::ucfirst(Auth::user()->name) }}</p>
        </div>

        <div class="">
          <button type="submit" class="text-center ml-2 inline-block font-semibold py-[0.875rem] px-6 text-green-500 bg-white rounded-xl border border-green-500 max-w-max transition-all duration-200 focus:bg-green-500 focus:text-white hover:bg-green-500 hover:text-white"> 
            Save 
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 relative inline-block w-6 h-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
              <circle cx="12" cy="14" r="2" />
              <polyline points="14 4 14 8 8 8 8 4" />
            </svg>
          </button>

          <a href="{{ route('posts.destroy', ['post' => $post]) }}" id="delete-link" class="text-center ml-2 inline-block font-semibold py-[0.875rem] px-6 text-red-500 bg-white rounded-xl border border-red-500 max-w-max transition-all duration-200 focus:bg-red-500 focus:text-white hover:bg-red-500 hover:text-white">
            Delete

            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 relative inline-block w-6 h-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <line x1="4" y1="7" x2="20" y2="7" />
              <line x1="10" y1="11" x2="10" y2="17" />
              <line x1="14" y1="11" x2="14" y2="17" />
              <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
              <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
            </svg>
          </a>
          
          <a href="/posts" class="text-center ml-2 inline-block font-semibold py-[0.875rem] px-6 text-gray-400 bg-white rounded-xl border border-gray-400 max-w-max transition-all duration-200 focus:bg-gray-400 focus:text-white hover:bg-gray-400 hover:text-white">
            Discard
  
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 relative inline-block w-6 h-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
            </svg>
          </a>
        </div>
      
      </form>

      @if ($errors->any())
        <h3 class="text-red-500 font-bold text-3xl !mt-14">Oops! Something went wrong:</h3>
        <ul class="text-red-500 font-medium text-lg list-inside list-disc !mt-2">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>          
      @endif

      <form id="delete-form" action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
      </form>

    </div>
  </div>
  
  <script>
    document.querySelector('#delete-link').addEventListener('click', (e) => {
      e.preventDefault();
      document.querySelector('#delete-form').submit();
    })
  </script>
</body>
</html>