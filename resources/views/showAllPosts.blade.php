<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="header.css">
    <title>Document</title>

</head>
<body>

<section class='header'>
    <div class='right'>
        <div class='content'>

        @if(Auth::user())
        <a href="">{{Auth::user()->name}}</a>
        <a href="\logout">Logout</a>
        @else
        <a href="\login">Login</a>
        <a href="\register">Register</a>
        @endif
        </div>

    </div>
</section>


<section class="hero">
 

<table>
  <tr>
    <th>id</th>
    <th>title</th>
    <!-- <th>image</th> -->
    <th>created_at</th>
    <th>updated_at</th>
    <th>user_id</th>
  </tr>
  @foreach($posts as $post)
  <tr>
    <td><a href="show/{{$post['id']}}" class = "link"> {{$post['id']}} </a></td>
    <td>{{$post['title']}}</td>
    <!-- <td>{{$post['image']}}</td> -->
    <td>{{$post['created_at']}}</td>
    <td>{{$post['updated_at']}}</td>
    <td><a href="show/{{$post['id']}}" class = "link">{{$post['user_id']}}</td>

  </tr>
  @endforeach
  </section>

</table>
</body>
</html>