<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function __invoke(Request $request)
  {
    $request->session()->increment('visits');

    $data = [
      'visits' => $request->session()->get('visits', 1),
      'ip' => $request->ip(),
      'path' => $request->path()
    ];

    return view('index', $data);
  }
}
