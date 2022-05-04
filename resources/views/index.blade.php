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

      <h1 class="text-black text-6xl font-bold mt-16">Hello {{ $name }}</h1>

      <p class="text-gray-900 mt-6 text-lg">
        Welcome to my small blog, made in Laravel. This is a personal project, which is made
        to help me understand the Laravel Framework better. Targets for this website:
      </p>

      <ul class="text-gray-700 mt-8 text-lg list-disc list-inside space-y-2">
        <li><b>Basic CRUD trough Models:</b> Understanding the models and what kind of CRUD they can execute. Model code available everywhere? </li>
        <li><b>Creating Views with Blade</b></li>
        <li><b>Routes that render views and check on session variables</b></li>
        <li><b>Updating config files to make use of .SQLITE-file</b></li>
        <li><b>Creating custom HTTP Controllers for each route</b></li>
      </ul>

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