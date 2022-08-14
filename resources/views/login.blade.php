<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="header.css">
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
             <h2>Share Gain Enrich skills with us</h2>
             <form action="" method="post"  class="loginForm" action="/login" >
                @csrf
                <label for="email"> Email</label>
                <input type="email" name="email" id="" placeholder="Enter your Email" required class="inTest">
                <label for="password"> Password</label>
                <input type="password" name="password" id="" placeholder="Password" requird >
                <button type="submit">Login</button>

             </form>
                    <h3>
                        <span>
                        Dont have account?
                        </span>
                            <a href="/register"> Sign Up</a>
                    </h3>

                

            </div>
            <div class ="right">
                <img src="5.jpg" alt="">
                <!-- <h2>CREATE A NEW POST</h2>
                <form action="" method="post">
                    <input type="text" class="title">
                    <input id="inputTag" class="image" type="file" accept="image/*"/>
                    <textarea name="body" id="" class ="content" cols="5" rows="5"></textarea> -->
                <!-- <div class ="rightUp"></div>
                <div class="rightDown"></div> -->
            </div>

        </div>

    </section>
</body>
</html>