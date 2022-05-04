<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(Request $request) {

  if(!$request->session()->has('visits')) Log::info('No visits found');

  $request->session()->increment('visits');

  $data = [
    'name' => 'Thim',
    'visits' => $request->session()->get('visits', 1),
    'ip' => $request->ip(),
    'path' => $request->path()
  ];

  return view('index', $data);
});
