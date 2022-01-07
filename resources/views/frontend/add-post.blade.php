@extends('frontend.template')
@section('body')
<div class="container" style="height: 89vh;overflow-y: hidden;">

      <form method="POST" 
      action="{{url('/post')}}" enctype="multipart/form-data">
          @csrf
          <div class="field">
            <label class="label" style="color: aliceblue;margin-top: 20px;">Title</label>
            <div class="control">
              <input class="input" type="text" placeholder="Enter Title...." name ="title" style="width: 100%;">
            </div>
          </div>

      <div class="field">
        <label class="label" style="color: aliceblue;">Body</label>
        <div class="control has-icons-left has-icons-right">
          <textarea class='textarea' placeholder="Enter article here..." value="" name="body" style="height: 300px;width: 100%;"></textarea>
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
    <button class="btn btn-success">Submit</button>
  </div>
  </form>

</div>

@stop