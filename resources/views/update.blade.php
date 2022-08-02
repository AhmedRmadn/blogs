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
 <form action="/action/{{$post->id}}" method ="POST">
 @csrf

 <label for="title">The title: </label>
 <input  value = "{{$post->title}}" id="title" name = "title" >
 <label for="body">The content: </label>
 <textarea name="body" id="body" cols="100" rows="10" id="body" name = "body" value="sdsdsd"> {{$post->body}} </textarea>
 <label for="image">The image: </label>
 <input  value = "{{$post->image}}" id="image" name="image">
 <input type="submit" value="update">
 </form>
</body>
</html>