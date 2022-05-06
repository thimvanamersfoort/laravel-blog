<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
  
  $user = $request->user();
  dump($user);

  $data = [
    'visits' => $request->session()->get('visits', 1),
    'ip' => $request->ip(),
    'path' => $request->path()
  ];

  return view('index', $data);
});

Route::get('/login', [UserController::class, 'show']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/logout', [UserController::class, 'logout']);