<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostStoreRequest; 
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $users = User::all();
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post','users'));
    }
    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));
    }
    

    private function file_operations($request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filepath = $image->store("images", "posts_uploads");
            return $filepath;
        }
        return null;
    }

    public function store(PostStoreRequest $request)
    {
        $file_path = $this->file_operations($request);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $file_path;
        $post->user_id = $request->user_id;
        $post->save();
        return redirect()->route("posts.show", $post->id);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $users = User::all();
        return view('posts.edit', compact('post', 'users'));
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $updated_data = $request->all();
        $post->title = $updated_data["title"];
        $post->body = $updated_data["body"];
        $file_path = $this->file_operations($request);
        $post->image = $file_path;
        $post->creator_id = $request->creator_id; 
        $post->save();
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
    public function restoreAll()
    {
        Post::onlyTrashed()->restore();
    
        return redirect()->back()->with('success', 'All posts restored successfully.');
    }
    
}
