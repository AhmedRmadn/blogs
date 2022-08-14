<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Card Tricks</title>
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<section class="sectionCreate">

<div class="headOfCreate">

<h1> 
    Share your skills and knowledge
</h1>
<h3>
   Create your valuable blog easily 
</h3>
<button class="createBlog"> <a href="\create">CREATE YOUR BLOG</a> </button>



</div>


<div class="search-box">

<form class="example" method="get" action="/test" style="margin:auto;max-width:300px">

  <input type="text" placeholder="Search.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>

</div>



</section>

<section class="hero">


    <div class="card-container">


      @foreach($posts as $post)
      <div class="post" >
      <div class="card-box-text">
        <a href="\show\{{$post->id}}"><h2>{{$post->title}}</h2></a>
        <a href="" class="owener"> Ahmed Ramadan</a>
        <h5>5 Aug 2020</h5>
        <p>{{substr($post->body,0,300)}}....</p>

        <!-- <div class="overlay">
            <button><a href=""> Show more</a></button>
        </div> -->

      </div>


      <div class="card-box-image">
        <div class="overlay">
        </div>
        <img src={{$post->image}} />
      </div>
      </div>

      @endforeach


    </div>

    </section>
  </body>
</html>
