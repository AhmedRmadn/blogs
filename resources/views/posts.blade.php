<!DOCTYPE html>
<html >
    <head>
    </head>
    <body >
    <button><a href="http://127.0.0.1:8000/create"> create a new post</a></button>
    @foreach($posts as $post)
    <h2> <a href="http://127.0.0.1:8000/show/{{$post->id}}">{{$post->title}}</a></h2>
    <p>{{$post->body}}</p>
    @endforeach
    </body>
</html>
