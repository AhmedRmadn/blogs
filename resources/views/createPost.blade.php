<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create post</title>
</head>
<body>
 <h2> Create Post</h2>
 <form action="/create" method ="POST">
 @csrf

 <label for="title">The title: </label>
 <input id="title" name = "title" >
 <label for="body">The content: </label>
 <textarea name="body" id="body" cols="100" rows="10" id="body" name = "body" > </textarea>
 <label for="image">The image: </label>
 <input id="image" name="image">
 <input type="submit" value="create">
 </form>
</body>
</html>