@extends('admin.master')
@section('content')
<div class="container">

      <form method="POST" 
      action="{{url('admin/posts/add-post')}}" enctype="multipart/form-data">
          @csrf
          <div class="field">
            <label class="label">Title</label>
            <div class="control">
              <input class="form-control" type="text" placeholder="Text input" name ="title">
            </div>
          </div>

      <div class="field">
        <label class="label">Body</label>
        <div class="control has-icons-left has-icons-right">
          <textarea class='form-control' placeholder="Enter article here..." value="" name="body"></textarea>
        </div>
      </div>

  <div class="input-group">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="image">
  </div>
</div>
<br>
<div>
    <button class="btn btn-success">Add</button>
  </div>
  </form>

</div>

@stop