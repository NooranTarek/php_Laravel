<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Card</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- <link rel="stylesheet" href="../../css/show.css"> -->
    <style>body {
    margin: 0;
    padding: 0;
    font-family: 'roboto', sans-serif;
    background-color: #F2F2F2;
}

h1 {
    text-align: center;
    color: #333333;
}

.cardcontainer {
    width: 350px;
    height: 500px;
    background-color: white;
    margin-left: auto;
    margin-right: auto;
    transition: 0.3s;
}

.cardcontainer:hover {
    box-shadow: 0 0 45px gray;
}

.photo {
    height: 300px;
    width: 100%;
}

.photo img {
    height: 100%;
    width: 100%;
}

.txt1 {
    margin: auto;
    text-align: center;
    font-size: 17px;
}

.content {
    width: 80%;
    height: 100px;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    top: -33px;
}

.photos {
    width: 90px;
    height: 30px;
    background-color: #E74C3C;
    color: white;
    position: relative;
    top: -30px;
    padding-left: 10px;
    font-size: 20px;
}

.txt4 {
    font-size: 27px;
    position: relative;
    top: 33px;
}

.txt5 {
    position: relative;
    top: 18px;
    color: #E74C3C;
    font-size: 23px;
}

.txt2 {
    position: relative;
    top: 10px;
}

.cardcontainer:hover>.photo {
    height: 200px;
    animation: move1 0.5s ease both;
}

@keyframes move1 {
    0% {
        height: 300px
    }

    100% {
        height: 200px
    }
}

.cardcontainer:hover>.content {
    height: 200px;
}

.footer {
    width: 80%;
    height: 100px;
    margin-left: auto;
    margin-right: auto;
    background-color: white;
    position: relative;
    top: -15px;
}

.btn {
    position: relative;
    top: 20px;
}

#heart {
    cursor: pointer;
}

.like {
    float: right;
    font-size: 22px;
    position: relative;
    top: 20px;
    color: #333333;
}

.fa-gratipay {
    margin-right: 10px;
    transition: 0.5s;
}

.fa-gratipay:hover {
    color: #E74C3C;
}

.txt3 {
    color: gray;
    position: relative;
    top: 18px;
    font-size: 14px;
}

.comments {
    float: right;
    cursor: pointer;
}

.fa-clock,
.fa-comments {
    margin-right: 7px;
}</style>
</head>
<body>
    <div class="container">
        <h1>Post Card</h1>
        <div class="cardcontainer">
            <div class="photo">
            <img src="{{asset('images/posts/'.$post['image'])}}" class="img-fluid" alt="...">
            <!-- <img src="{{$post['image']}}" alt="{{ $post['title'] }}" class="img-fluid"> -->
                <div class="photos">Post {{$post['id']}}</div>
            </div>
            <div class="content">
                <p class="txt4">{{ $post['title'] }}</p>
                <p class="txt2">{{ $post['body'] }}</p>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, {});
        });
        document.getElementById("heart").onclick = function() {
            document.querySelector(".fa-gratipay").style.color = "#E74C3C";
        };
    </script>
</body>
</html>
