<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Post</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="{{asset('css/create.css')}}"> -->
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
img{
    height: 200px;
    width:200px;
    margin-left:200px;
}
</style>
</head>
<body>
<div class="container">
<img src="https://cdn-icons-png.flaticon.com/512/8070/8070671.png" />

    <h1>Add Post</h1>
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
            @error('title')
                <span class="error" style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" rows="5" placeholder="Enter body"></textarea>
            @error('body')
                <span class="error"style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Image</label>
            <input type="file" name="image" class="form-control"  aria-describedby="emailHelp">
        </div>

        <div class="form-group">
    <label for="user_id">Select Creator</label>
    <select name="user_id" id="user_id" class="form-control">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
</div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>

