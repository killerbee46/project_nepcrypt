@php
use Illuminate\Support\Facades\Auth;
$user = auth()->user();
@endphp
@extends('frontend.template')

@section('body')

<div style="background-color: rgba(0, 0, 0, 0.514);margin-top: -20px;padding: 0;">
<h3 style="color: aliceblue;margin-top: 10px; text-align: center;margin-top: 25px;">{{$post->title}}</h3><span style="color: aliceblue;position: absolute;right: 30px;top: 20px;font-size: 1.1em;">-{{$post->user_name}}</span> 
<div style="padding: 40px;text-align: center;display: flex;width: 98vw;" id="product">
    <div style="width: 50%;">
    <img src="{{asset('/images/posts/'.$post->image)}}" height="500px" width="100%" alt="NO IMAGE TO SHOW" style="margin: auto;border: 3px solid black;">
    </div>
    <div style="width: 50%;overflow-wrap: break-word;">
    <p style="color: aliceblue;font-size: 1.3em;text-align: left;padding: 10px;padding-top: 0;">{{$post->body}}</p>
    </div>
    </div>
</div>

@if($user==NULL)
<div></div>
@else
    @if(($user->id)==($post->user_id))
    <a href="{{url('/deletepost/'.$post->id)}}" class="btn btn-default"><button type="button" class="btn btn-danger">Delete</button></a>

    @endif
@endif

@auth
    <div style="background-color: black; width: 100vw;padding-bottom: 20px;">
        
    <form method="POST" action="{{url('post/comment/'.$post->id)}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1" style="background-color: black;color: chartreuse;font-size: 1.3em;">Enter comment here</label>
            <input type="text" class="form-control" placeholder="Comment Here..." name="comment" required="true" style="background-color: black;color: chartreuse;">
        </div>
    
        <button  class="btn btn-primary">Comment</button>
    </form>
    </div>
    @endauth

    <div style="margin-top: .5px;width: 98.75vw;">
                <div class="col-lg-12" style="padding-top: 20px;background-color: black;">
                    <div class="card" style="background-color: black;color: chartreuse;">
                        <div class="card-body text-center">
                            <h4 class="card-title">Latest Comments</h4>
                        </div>
                        @foreach($comments as $comment)
                            <div class="comment-widgets">
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2">
                                    <img src="{{asset('/images/users/'.$comment->user->profile_pic)}}" alt="O" width="50" class="rounded-circle" style="border-radius: 50%;overflow: hidden;"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">{{$comment->user_name}}</h6>
                                         <span class="m-b-15 d-block">{{$comment->comment}}</span>
                                        <div class="comment-footer"> <span class="text-muted float-right">{{$comment->created_at}}</span> 
                                            @if($user==NULL)
<div></div>
@else
    @if(($comment->user_id)==($user->id))
    <a href="{{url('/deletecomment/'.$comment->id)}}" class="btn btn-default"><button type="button" class="btn btn-danger">Delete</button></a>

    @endif
@endif
                                         </div>
                                    </div>
                                </div> <!-- Comment Row -->
                                
                            </div> <!-- Card -->
                            <br>
                        @endforeach()
                    </div>
                </div>
            </div>
</div>



@endsection