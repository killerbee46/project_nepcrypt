@extends('frontend.template')

@section('body')

<div style="margin-top:-20px">
  <div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
      <li data-target="#demo" data-slide-to="3"></li>
    </ul>
  
    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="sliderimage" src="{{asset('/images/local/slider.jpg')}}" alt="no image">
        <div class="carousel-caption">
          <h3>Welcome To NepCrypt</h3>
          <p>Get familiar with Network Security</p>
          @if (Route::has('login'))
          @auth
          
          @else
          <a href="/login"><button class="btn btn-info sliderbutton">Get Started</button></a>
          @endauth
          @endif
        </div>
      </div>
      <div class="carousel-item">
        <img class="sliderimage" src="{{asset('/images/local/slider.jpg')}}" alt="no image">
        <div class="carousel-caption">
          <h3>Get Knowledge</h3>
          <p>Read blogs from writers to get knowledge about network security</p>
          @if (Route::has('login'))
          @auth
          
          @else
          <a href="/login"><button class="btn btn-info sliderbutton">Get Started</button></a>
          @endauth
          @endif
        </div>
      </div>
      <div class="carousel-item">
        <img class="sliderimage" src="{{asset('/images/local/slider.jpg')}}" alt="no image">
        <div class="carousel-caption">
          <h3>Share Knowledge</h3>
          <p>Be a blogger and post the knowledge you have</p>
          @if (Route::has('login'))
          @auth
          
          @else
          <a href="/login"><button class="btn btn-info sliderbutton">Get Started</button></a>
          @endauth
          @endif
        </div>
      </div>
      <div class="carousel-item">
        <img class="sliderimage" src="{{asset('/images/local/slider.jpg')}}" alt="no image">
        <div class="carousel-caption">
          <h3>Clear your doubts</h3>
          <p>Interact with writers and other users on the topic</p>
          @if (Route::has('login'))
          @auth
          
          @else
          <a href="/login"><button class="btn btn-info sliderbutton">Get Started</button></a>
          @endauth
          @endif
        </div>
      </div>
    </div>
  
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  
  </div>
    
  </div>
@endsection