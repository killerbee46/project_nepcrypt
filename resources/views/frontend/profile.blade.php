@extends('frontend.template')

@section('body')

        <!-- Column -->
            <div class="row" style="width: 60vw;text-align: center;justify-content: center;">
                <div class="col-md-8">
                    <img src="{{asset('/images/users/image.png')}}" height="100%" width="100%" style="overflow: hidden;">
                </div>
                <div class="col-md-4" style="padding: 40px;background-color: bisque;font-size: 1.5em;">
                   <div style="font-size: 2em;font-weight: 600;"> <br> {{Auth::user()->name}}</div>
                   <div>Email: <br> {{Auth::user()->email}}</div>
                   <div>Phone: <br> {{Auth::user()->mobile}}</div>
                </div>
            </div>


@endsection