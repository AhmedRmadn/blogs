<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$post->title}}</title>
</head>
<body>
    <h1>{{$post ->title}} </h1>
    <p> {{$post -> body}}</p>
    <button><a href="http://127.0.0.1:8000/update/{{$post->id}}"> update</a></button>
    <button><a href="http://127.0.0.1:8000/delete/{{$post->id}}"> delete</a></button>
    
</body>
</html>