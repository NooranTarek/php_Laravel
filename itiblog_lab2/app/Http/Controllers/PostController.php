<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    function create()
    {
        return view('posts.create');
    }

    private function file_operations($request)
    {

        if ($request->hasFile('image')) {
            // dd('hello from file operation');
            $image = $request->file('image');
            // $file_name=time() . '.' . $image.getClientOriginalExtension();
            $filepath = $image->store("images", "posts_uploads");
            // dd($image->getClientOriginalName());
            return $filepath;
        }
        return null;
    }

    function store(Request $request)
    {
        $file_path = $this->file_operations($request);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $file_path;
        $post->save();
        return redirect()->route("posts.show", $post->id);
    }

    function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }



    function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $updated_data = request()->all();
        $post->title = $updated_data["title"];
        $post->body = $updated_data["body"];
        $file_path = $this->file_operations(request());
        $post->image = $file_path;

        $post->save();
        return redirect()->route('posts.index');
    }

    function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
    
}