<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('createPost.css')}}">
    <link rel="stylesheet" href="{{asset('header.css')}}">
    <title>Document</title>
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
        <div class="subHero">
            <div class="left">
             <h2>Update your post</h2>
         
             <form action="/update/{{$post->id}}" method ="POST" class="loginForm"  enctype="multipart/form-data" >
                @csrf
                <input type="text" name="title"  placeholder="Title: " value ="{{$post->title}}"required class="inTest">
                <textarea name="body" id="body" cols="100" rows="15" id="body" name = "body" placeholder="Body:"> {{$post->body}}</textarea>
                <input type="file" name="image" class="uploadImage">
                <button type="submit">Update post</button>

             </form>

                

            </div>
            <!-- <div class ="right">
                <img src="5.jpg" alt="">
            </div> -->

        </div>

    </section>
</body>
</html>