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
      'name' => 'required',
      'password' => 'required'
    ]);

    if(Auth::attempt($credentials)){

      $request->session()->regenerate();

      dump($request->session());
      return redirect('/');
    }

    return back()->withErrors([
      'username' => 'De gebruikersnaam en/of het wachtwoord zijn incorrect.'
    ])->onlyInput('email');
  }

  public function logout(Request $request) {
    Auth::logout();
 
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }
}
