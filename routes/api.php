<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1');

Route::post('/validate', function(Request $request) {
  Log::info($request->ip());

  return response('Welcome to my first API in Laravel!', 200)
    ->header('X-Header-Hello', 'World');
  
});