<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function index()
    {
      $posts = Post::orderBy('id', 'DESC')->paginate(10);
      return view('home')->with(['posts' => $posts]);

    }
}
