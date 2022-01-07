<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bluma css cdn -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
  
  <!-- laravel css   -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- boostrap css cdn -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <style>
    body{
      color: aliceblue;
    }
    .nav li{
      color: aliceblue;
      padding: 10px;
      padding-right: none;
      padding-bottom: 20px;
    }
    .nav-item a{
      text-decoration: none;
      font-size: 1.3em;
      color: aliceblue;
      border-bottom: 2px solid black;
    }
    .navbar-brand a{
      text-decoration: none;
      color: aliceblue;
      border-bottom: 2px solid black;
    }
  </style>

</head>
<body>
  <div class="row" style="padding-left:40px;padding-top: 20px;background-color: rgba(24, 24, 24, 0.589);">
    <nav>
      <ul class="menu" style="width:97vw;display: flex;justify-content: space-between;">
        <li><div><a href="{{ url('/admin') }}"><h3 style="color: rgb(224, 224, 224);">DASHBOARD</h3></a></div></li>
        <li>
          <div class="dropdown">
            <button class="btn dropdown-toggle" style="color: aliceblue;background-color: black;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="{{asset('/images/users/image.png')}}" height="30px" width="30px" style="border-radius: 50%;border: 1px solid rgb(92, 92, 92);overflow: hidden;margin-right: 10px;">User Name
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ url('/admin/profile') }}">Profile</a>
              <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
  </div>

<div class="row">
  <div class="col-md-2" style="padding-right: 0;">
    <div class="nav"  style="padding-left:30px ;background-color: rgb(48, 47, 47);display: flex;flex-direction: column;color: aliceblue;height: 88.1vh;width: 100%;">
      <li class="nav-item">
        <a href="{{ url('/admin/users') }}">
         Users
      </a>
      </li>
      
      <li class="nav-item">
        <a href="{{ url('/admin/post') }}">
         Post
      </a>
      </li>
      
      <li class="nav-item">
        <a href="{{ url('/admin/profile') }}">
          User Profile
      </a>
      </li>
      <li>
        <a href="{{url('/')}}">
          <button class="btn btn-primary" >Back To Site</button>
        </a>
      </li>
    </div>

    
  </div>
  <div class="col-md-10" style="padding: 30px;background-color: black;">
    @yield('content')
  </div>
</div>



  <script type="text/javascript">
$(document).on('change', '.custom-file-input', function (event) {
    $(this).next('.custom-file-label').html(event.target.files[0].name);
})
