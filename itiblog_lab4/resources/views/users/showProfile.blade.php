@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $user->name }}'s Profile</h1>

        <div>
            <p>Email: {{ $user->email }}</p>
            <!-- Add other user profile information as needed -->
        </div>

        <h2>{{ $user->name }}'s Posts</h2>

        <ul>
            @foreach($posts as $post)
                <li>
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->body }}</p>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
