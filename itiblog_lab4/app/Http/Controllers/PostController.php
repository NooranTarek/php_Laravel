<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostStoreRequest; 
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Facades\Auth; 
use App\Jobs\PruneOldPostsJob;
use Spatie\Tags\Tag;

dispatch(new PruneOldPostsJob());

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
        $tags = Tag::all(); 
        return view('posts.create', compact('users', 'tags'));
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
        $postCreator_id = Auth::id();
        $request_params = $request->all(); 
    
        // if ($request->has('tags')) {
        //     $tagNames = explode(',', $request->tags);
        //     $tags = Tag::findOrCreate($tagNames);
        //     $post->attachTags($tags);
        // }
        
    
        if ($postCreator_id) {
            $request_params['postCreator_id'] = $postCreator_id;
        }
        $request_params['image'] = $file_path; 
        $post = Post::create($request_params);
        return redirect()->route("posts.show", $post->id);
    }
    

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $users = User::all();
        return view('posts.edit', compact('post', 'users'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
    
        if (Auth::id() !== $post->postCreator_id) {
            abort(403, 'Unauthorized action.');
        }
    
        $updated_data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            // Add validation rules for other fields if needed
        ]);
    
        $file_path = $this->file_operations($request);
        if ($file_path) {
            $updated_data['image'] = $file_path;
        }
    
        $post->update($updated_data);
    
        return redirect()->route('posts.index');
    }
    

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
    
        if (Auth::id() !== $post->postCreator_id) {
            abort(403, 'Unauthorized action.');
        }
    
        $post->delete();
    
        return redirect()->route('posts.index');
    }
    
    public function restoreAll()
    {
        Post::onlyTrashed()->restore();
    
        return redirect()->back()->with('success', 'All posts restored successfully.');
    }
    
}
