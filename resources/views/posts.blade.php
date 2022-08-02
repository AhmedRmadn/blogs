<!DOCTYPE html>
<html >
    <head>
    </head>
    <body >
    @foreach($posts as $post)
    <h2> <a href="http://127.0.0.1:8000/{{$post->id}}">{{$post->title}}</a></h2>
    <p>{{$post->body}}</p>
    @endforeach
    </body>
</html>
