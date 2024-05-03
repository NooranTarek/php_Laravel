<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User; 

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.show', compact('comment'));
    }
    public function create()
    {
        $users = User::all();
        return view('comments.create', compact('users'));
    }
    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
    
        $comment = new Comment();
        $comment->content = $request->input('content');
        $post->user_id = $request->user_id;

        $post->comments()->save($comment);
    
        return redirect()->route('posts.show', $postId)->with('success', 'Comment added successfully.');
    }}
