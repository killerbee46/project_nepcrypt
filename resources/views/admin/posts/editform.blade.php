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


      <form method="POST" 
      action="{{url('/admin/posts/edit-post/$posts->id')}}" enctype="multipart/form-data">
          @csrf
          <div class="field">
            <label class="label">Title</label>
            <div class="control">
              <input class="form-control" type="text" placeholder="Text input" value="{{$posts->title}}" name ="title">
            </div>
          </div>

      <div class="field">
        <label class="label">Body</label>
        <div class="control has-icons-left has-icons-right">
          <textarea class='form-control' placeholder="Enter article here..." name="body">{{$posts->body}}</textarea>
        </div>
      </div>

  <div class="input-group">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="image">
    <label class="custom-file-label custom-file" for="inputGroupFile04">Choose file</label>
  </div>
</div>
<br>
<div>
    <button class="btn btn-success">Update</button>
  </div>
  </form>

</div>

@stop