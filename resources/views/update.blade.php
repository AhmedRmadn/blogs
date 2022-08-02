<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update page</title>
</head>
<body>
 <h2> update Post</h2>
 <form action="/action" method ="POST">
 @csrf
 <label for="title">The title: </label>
 <input  value = "{{$post->title}}" id="title">
 <label for="body">The content: </label>
 <textarea name="" id="" cols="100" rows="10" id="body"> {{$post->body}} </textarea>
 <label for="image">The image: </label>
 <input  value = "{{$post->image}}" id="image">
 <input type="submit" value="update">
 </form>
</body>
</html>