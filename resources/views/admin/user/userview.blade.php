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
                        <div class="white-box">
                            <div style="display: flex;justify-content: space-between;">
                                <h3 class="box-title">Registered Users</h3>
                                <form action="/admin/users/searchuser" method="POST"> @csrf
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
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Role</th>
                                            <th colspan="3" class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $post )
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->name}}</td>
                                            <td>{{$post->email}}</td>
                                            <td><?php if($post['role']=='3'){echo "Admin";} else if($post['role']=="2") {echo "Blogger";} else {echo "User";}?></td>
                                            <td style="width: 40px;"><a href="/admin/users/edit-user/{{$post->id}}"><button class="btn btn-info">Edit</button></a></td>
                                            <form method="POST" action="/users/delete-user/{{$post->id}}">
                                                @csrf
                                                @method('delete')
                                                <td><input class="btn btn-danger" type="submit" value="Delete"></td>
                                                </form>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                                <!-- <a href="/admin/users/add-user" class="btn btn-primary" >Create User</a> -->
                            </div>
                        </div>
                    </div>
                </div>
           
            </div>
          
        </div>
        
    </div>
   @endsection