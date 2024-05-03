
@extends('layouts.app')

<?php
use Carbon\Carbon;
?>


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="../../css/edit.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        textarea {
            resize: vertical;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        img {
            height: 200px;
            width: 200px;
            margin-left: 200px;
        }
    </style>
</head>

<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>All <b>Posts</b></h2></div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Title-Slug</th>
                        <th>Body</th>
                        <th>Author</th>
                        <th>Created At</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
    @foreach($posts as $post)
    <tr>
        <td>{{ $post['id'] }}</td>
        <td>{{ $post['title'] }}</td>
        <td>{{ $post['slug'] }}</td>
        <td>{{ $post['body'] }}</td>
        <td>
            {{ \App\Models\User::find($post['user_id'])->name ?? 'Unknown' }}
        </td>
        <td>{{ \Carbon\Carbon::parse($post->created_at)->format('l, F jS, Y \a\t h:i A') }}</td>
        <td>{{ $post->post_creator ? $post->post_creator->name : "no creator" }}</td>

        <td>
            <div class="btn-group" role="group" aria-label="Actions">
                <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-primary" title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-warning" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                <!-- //because browser understand the post and get methods only so we pass delete as post -->
                <form method="POST" action="{{ route('posts.destroy', ['id' => $post['id']]) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" title="Delete" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete this post?')"><i class="fa fa-trash"></i></button>
                </form>
                <!-- Restore button inside the loop -->

            </div>
        </td>
    </tr>

    @endforeach
</tbody>

            </table>


            <form action="{{ route('posts.restoreAll') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Restore All</button>
            </form>
            <a href="{{ route('posts.create') }}" class="btn btn-success">Add Post</a>
        </div>
    </div>  
</div>
   
</body>
</html>
@endsection
