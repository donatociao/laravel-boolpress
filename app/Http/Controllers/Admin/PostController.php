<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index()
    {
      $posts = Post::orderBy('id', 'DESC')->paginate(5);
      return view('admin.post')->with(['posts' => $posts]);
    }

    public function create()
    {
      $categories = Category::all();
        return view('admin.newpost')->with(['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $form_input = $request->all();
        $new_post = new Post;
        $new_post->fill($form_input);
        if ($new_post->title == true) {
          $new_post->slug = Str::slug($new_post->title);
        } else {
          $new_post->slug = $new_post->title;
        }
        // $new_post->slug = Str::slug($new_post->title);
        $new_post->save();

        return redirect()->route('admin.posts');

    }

    public function show($slug)
    {
      $post = Post::where('slug', $slug)->first();
      if(empty($post)) {
        abort(404);
      }
      return view('posts.show', compact('post'));

    }


    public function edit($id)
    {
      $categories = Category::all();
      $post_to_mod = Post::find($id);
      if (empty($post_to_mod)) {
        abort(404);
      }
      return view('admin.edit')->with([
        'post' => $post_to_mod,
        'categories' => $categories
      ]);
    }


    public function update(Request $request, $id)
    {
      $mod_input = $request->all();
      $mod_post = Post::find($id);
      $mod_post->fill($mod_input);

      $mod_post->save();
      return redirect()->route('admin.posts');
    }


    public function destroy($id)
    {
        $post_to_delete = Post::find($id);
        if (!empty($post_to_delete)) {
          $post_to_delete->delete();
        }
        return redirect()->route('admin.posts');
    }

}
