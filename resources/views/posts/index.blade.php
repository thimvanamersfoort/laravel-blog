<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Posts  | Laravel Blog</title>

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 max-h-screen">
    <div class="max-w-2xl mx-auto flex flex-col min-h-screen">

      <h1 class="text-black text-6xl font-bold mt-16">All posts</h1>

      <div class="grid grid-cols-1 gap-y-2 mt-12">

        @foreach (App\Models\Post::all() as $post)

          <a href="/posts/{{ $post->id }}" class="border-2 rounded-lg py-4 px-6 border-gray-400 hover:shadow-md hover:border-black duration-200 transition-all flex justify-between">
            <div>
              <h1 class="text-lg font-bold mt-1">{{ $post->title }}</h1>
              <p>Gepost op {{ $post->created_at }}</p>            
            </div>

            <div class="flex flex-col items-end">
              <img class="h-10 w-10 rounded-full" src="https://www.pngitem.com/pimgs/m/4-40070_user-staff-man-profile-user-account-icon-jpg.png" alt="">
              <p class="text-indigo-500 text-sm font-bold text-right mt-2 leading-4  w-20">{{ $post->user->name }}</p>
            </div>
          </a>
        @endforeach

        <hr class="border-t-2 border-gray-400 my-8 border-dashed">
        
        <div>
          @if (Auth::user())
            <a href="/posts/create" class="text-center font-semibold py-4 px-6 text-black bg-white rounded-xl border border-black max-w-max transition-all duration-200 focus:bg-black focus:text-white hover:bg-black hover:text-white">Make a new blogpost</a>
          @else
            <a href="/login" class="text-center inline-block font-semibold py-4 px-6 text-black bg-white rounded-xl border border-black max-w-max transition-all duration-200 focus:bg-black focus:text-white hover:bg-black hover:text-white">Login to create a new blogpost</a>
          @endif  
  
          <a href="/" class="text-center ml-2 inline-block font-semibold py-[0.875rem] px-6 text-black bg-white rounded-xl border border-black max-w-max transition-all duration-200 focus:bg-black focus:text-white hover:bg-black hover:text-white">Back home</a>
        </div>
      




    </div>
  </div>
</body>
</html>