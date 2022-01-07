@extends('admin.master')
@section('content')
<div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('errors') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="buttons" style="float: right;">
            <a href="{{url('admin/users/add-user')}}" class="button is-primary">Add User</a>
        </div>
         <h2>Search result </h2>

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
                    @foreach ($data as $post )
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->email}}</td>
                        <td style="width: 40px;"><a href="/admin/users/edit-user/{{$post->id}}"><button class="btn btn-info">Edit</button></a></td>
                        <form method="POST" action="admin/users/{{$post->id}}">
                            @csrf
                            @method('delete')
                            <td><input class="btn btn-danger" type="submit" value="Delete"></td>
                            </form>
                    </tr>
                   @endforeach
                </tbody>
            </table>
        <!--  <p>Red background </p> -->
</div>
        <!--  <p>Red background </p> -->
</div>
 @stop