@extends('frontend.template')

@section('body')


<div class="row" style="justify-content: center; width: 100vw;">
    <div class="col-md-10">
        <div class="nav" style="margin-top: 9px;height: 10vh;justify-content: space-evenly ;text-align: center;font-size: 1.5em;font-weight: 600;color: chartreuse;background-color: black;padding-top: 10px;">
                
            <div class="encrypt"> <a href="{{ url('/encro/encrypt') }}"><button class="btn btn-success">ENCRYPT</button></a></div>
            <div class="title"><h2>AES ENCRYPTION</h2></div>
            <div class="decrypt"><a href="{{ url('/encro/decrypt') }}"><button class="btn btn-danger">DECRYPT</button></a></div>
        </div>
        <div class="crypto">

            @yield('crypto')

        </div>

    </div>
</div>


@endsection