<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

  public function show() {
    return view('login');
  }
  
  public function login(Request $request) {

    $credentials = $request->validate([
      'name' => 'required|max:255',
      'password' => 'required|max:255'
    ]);

    if(Auth::attempt($credentials)){

      $request->session()->regenerate();

      return redirect('/');
    }

    return back()->withErrors([
      'username' => 'The username and/or password are incorrect.'
    ])->onlyInput('email');
  }

  public function logout(Request $request) {
    Auth::logout();
 
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }
}
