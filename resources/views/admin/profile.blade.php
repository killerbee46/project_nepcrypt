@extends('admin.master')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
            <div class="container-fluid">
                <div class="row" style="justify-content: center;background-color: aliceblue;padding: 40px;">
                    <div class="col-md-10" style="background-color: azure;border: 2px solid gray;">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="{{asset('/images/users/image.png')}}" height="100%" width="100%" style="overflow: hidden;">
                            </div>
                            <div class="col-md-4" style="padding: 40px;background-color: bisque;font-size: 1.5em;">
                               <div style="font-size: 2em;font-weight: 600;"> <br> {{Auth::user()->name}}</div>
                               <div>Email: <br> {{Auth::user()->email}}</div>
                               <div>Phone: <br> {{Auth::user()->mobile}}</div>
                               {{Auth::user()->profile_pic}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endsection