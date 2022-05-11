<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Laravel Blog</title>

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 max-h-screen">
    <div class="max-w-2xl mx-auto flex flex-col min-h-screen">

      <h1 class="text-black text-6xl font-bold mt-16">Login to create posts</h1>

      <form action="/login" method="POST" class="mt-12 sm:max-w-[60%] space-y-8">
        @csrf

        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-black focus-within:border-black">
          <label for="name" class="absolute -top-3 left-2 -mt-px inline-block px-1 bg-white text-sm font-medium text-gray-900">Username</label>
          <input type="text" name="name" id="name" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
        </div>

        <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-black focus-within:border-black">
          <label for="password" class="absolute -top-3 left-2 -mt-px inline-block px-1 bg-white text-sm font-medium text-gray-900">Password</label>
          <input type="password" name="password" id="password" required class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
        </div>

        <button type="submit" class="py-4 px-4 text-black bg-white font-medium rounded-xl border border-black w-40 transition-all duration-150 focus:bg-black focus:text-white hover:bg-black hover:text-white outline-none">
          Log in
        </button>

        @if ($errors->any())
          @foreach ($errors->all() as $error)
            <p class="text-red-500">{{ $error }}</p>
          @endforeach
        @endif

      </form>

    </div>
  </div>
</body>
</html>