<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('post.css')}}">
    <link rel="stylesheet" href="{{asset('header.css')}}">
    <title></title>
</head>
<body>
<section class='header'>
    <div class='right'>
        <div class='content'>

        @if(Auth::user())
        <a href="">{{Auth::user()->name}}</a>
        <a href="">Logout</a>
        @else
        <a href="\login">Login</a>
        <a href="\register">Register</a>
        @endif
        </div>

    </div>
</section>

    <section class="hero"> 
  
    <div class="title">
    <h1>{{$post ->title}} </h1>
    </div>

    <div class="postContent">



    <div class="postBody">
    <p> {{$post -> body}} </p>
    </div>

    <div class="postImage">
    <img src="{{asset('public\Image\202208081301Top-10-Computer-Science-Universities-in-UK.jpeg')}}" > 
    
    <button class="update"><a href="http://127.0.0.1:8000/update/{{$post->id}}"> update</a></button>
    <button class="delete"><a href="http://127.0.0.1:8000/delete/{{$post->id}}"> delete</a></button>
    </div>



    </div>


    </section>
    
</body>
</html>