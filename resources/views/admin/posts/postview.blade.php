@extends('admin.master')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box" >
                            <div style="display: flex;justify-content: space-between;">
                            <h3 class="box-title">Posts</h3>
                                <form action="/admin/posts/search-post" method="POST"> @csrf
                                    <div style="display: flex;">
                                <input class="form-control" style="width: 200px;" type="search" name="searched" placeholder="Search...." /><button class="btn" style="background-color: gray;">Search</button>
                            </div>   
                            </form>
                        </div>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Title</th>
                                            <th class="border-top-0">Image</th>
                                            <th colspan="3" class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post )
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->image}}</td>
                                            <td style="width: 40px;"><a href="/admin/posts/edit-post/{{$post->id}}"><button class="btn btn-info">Edit</button></a>
                                                <a href="/admin/posts/delete-post/{{$post->id}}"><button class="btn btn-danger">Delete</button></a></td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                                <a href="/admin/posts/add-post" class="btn btn-primary" >Create Post</a>
                            </div>
                        </div>
                    </div>
                </div>
           
            </div>
          
        </div>
        
    </div>
   @endsection