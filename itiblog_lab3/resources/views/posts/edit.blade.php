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
<style>body {
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
}</style>
</head>
<body>
<div class="container">
<img src="data:image/png;base64,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" />

    <h1>Edit Post</h1>
    <form method="POST" action="{{ route('posts.update', ['id' => $post['id']]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post['title'] }}">
            @error('title')
                <span class="error"style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" rows="5">{{ $post['body'] }}</textarea>
            @error('body')
                <span class="error"style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" value="{{ $post['image'] }}"><br>
        </div>

<div class="form-group">
<select name="creator_id" class="form-control">
    @foreach($users as $user)
        <option value="{{ $user->id }}" {{ $post->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
    @endforeach
</select>
</div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

</body>
</html>
