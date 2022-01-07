<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>NEPCRYPT</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        .navbar{
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            z-index: 9;
            height: 10vh;
            padding-top: 25px;
            background-color: rgba(0, 0, 0, 0.904);
            background-color: black;
        }
        .card{
            border: none;
        }
        .card-body{
            background-image: linear-gradient(to right, green, black);
            color: white;
        }
        .navbar .navbar-brand{
            color: chartreuse;
        }
        .topnav{
            height: 9vh;
        }
        .topnav a{
            color: aliceblue;
        }
        .topnav a:hover {
            border-bottom: 3px solid black;
            margin-top: -3px;
        }
        body{
            position:absolute;
            top: 10vh;
            background-color: black;
            background-size: cover;
            background-repeat: fixed;
            max-height: 100vh;
        }
        .instruction{
            font-size: 1.5em;
            color: aliceblue;
            font-weight: 600;
        }
        .carousel-caption{
            position: absolute;
            top: 25vh;
            right: -5vw;
        }
        .carousel-caption h3{
            font-size: 3em;
        }
        .carousel-caption p{
            font-size: 1.3em;
        }
a.dropdown-item{
    color: black;
}
.carousel-inner{
    height: 93.1vh;
    width: 100vw;
}
.sliderimage{
    width: 98.6vw;
}
.white_table{
    background-color: aliceblue;
    margin-bottom: 40px;
}
.sliderbutton{
    font-size: 1.2em;
}
 </style>
</head>

<body style="width: 100vw;overflow-x: hidden;">
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{ url('/') }}"><div style="width: 250px;"><img width="50%" style="margin-left: 25%;" src="{{asset('/images/logo.png')}}" alt="NepCrypt"></div></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto topnav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}" style="color: aliceblue;font-size: 1.3em;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/post') }}" style="color: aliceblue;font-size: 1.3em;">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/encro') }}" style="color: aliceblue;font-size: 1.3em;">En/De-Crypt</a>
                </li>

                <li>
                    @if (Route::has('login'))
                @auth
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" style="color: aliceblue;background-color: black;font-size: 1.3em;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img src="{{asset('/images/users/image.png')}}" height="30px" width="30px" style="border-radius: 50%;border: 1px solid rgb(92, 92, 92);overflow: hidden;margin-right: 10px;"> <span >{{ Auth::user()->name }}</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if(Auth::user()->role == 3)
                            <a class="dropdown-item" href="{{ url('/admin') }}">Admin Control</a>
                            @endif
                          <a class="dropdown-item" href="{{ url('/profile') }}">Profile</a>
                          <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                        </div>
                      </div>
                @else
                <div class="dropdown">
                    <button class="btn dropdown-toggle" style="color: aliceblue;background-color: black;font-size: 1.3em;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Login
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                      <a class="dropdown-item" href="{{ url('/login') }}">Login</a>
                      <a class="dropdown-item" href="{{ url('/register') }}">Register</a>
                    </div>
                  </div>
                  @endauth
                  @endif
                </li>
            </ul>
        </div>
    </nav>
</div>
<div>
    @yield('body')
</div>


</body>

</html>
