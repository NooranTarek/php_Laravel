<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $post_info = [
        [
            "id" => 1,
            "title" => "10 Tips for a Healthy Lifestyle",
            "body" => "Living a healthy lifestyle is essential for overall well-being. Check out these 10 tips to help you stay healthy and happy.",
            "image" => "healthy_lifestyle.jpg",
 
        ],
        [
            "id" => 2,
            "title" => "The Power of Positive Thinking",
            "body" => "Positive thinking can transform your life. Learn how to cultivate a positive mindset and attract positivity into your life.",
            "image" => "positive.png",
        ],
        [
            "id" => 3,
            "title" => "5 Ways to Boost Your Productivity",
            "body" => "Boosting productivity is key to achieving your goals. Discover 5 effective strategies to enhance your productivity and get more done.",
            "image" => "productivity.jpg",
        ],
        [
            "id" => 4,
            "title" => "10 Must-Read Books for Personal Growth",
            "body" => "Books have the power to change lives. Explore this list of 10 must-read books for personal growth and self-improvement.",
            "image" => "growth.jpg",
        ],
    ];
    

    public function index()
    {
        $posts = $this->post_info;
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = $this->getPostById($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function edit($id)
    {
        $post = $this->getPostById($id);
        return view('posts.edit', compact('post'));
    }

    private function getPostById($id)
    {
        foreach ($this->post_info as $post) {
            if ($post['id'] == $id) {
                return $post;
            }
        }
        abort(404); 
    }}