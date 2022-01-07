@extends('frontend.encro')
@section('crypto')



<script src="../../essential/aes.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"
    integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script>
    function encrypt() {
        var enckey = document.getElementById('enckey').value;
        var ptext = document.getElementById('plain').value;
        var encrypted = CryptoJS.AES.encrypt(ptext, enckey);
        document.getElementById('encoded').value = encrypted;
    }


</script>
<form action="/encro/addencrypt" method="POST">
    @csrf
<div class="row">
    <div class="col-md-6">
        <div class="field">
            <label class="label" style="color: aliceblue !important; font-size: 1.2em;">Enter your messages here...</label>
            <div class="control">
                <textarea class="plain" id='plain' style="width: 100%;height:60vh" name="plain"></textarea>
            </div>
          </div>
        <div class="instruction">
            
        </div>
        <div>
           
        </div>
        <div class="field" style="display:flex">
            <label class="label" style="color: aliceblue !important; font-size: 1.2em;">Enter Key here:</label>
            <div class="control">
                <input class="form-control" type="text" style="margin-left: 20px;" name='key' id='enckey'>
            </div>
            <div>
                <input type="button" onclick="encrypt()" style="margin-left:21px" class="btn btn-warning" value="Encrypt">
            </div>
          </div>
            
        
    </div>
    <div class="col-md-6">
        <div class="field">
            <label class="label" style="color: aliceblue !important; font-size: 1.2em;">See your result here...</label>
            <div class="control">
                <Textarea class="encoded" name="encrypted" id='encoded' style="width: 100%;height:60vh"></Textarea>
            </div>
          </div>
        <!-- <button type="submit" class="btn btn-success">Save</button> -->
    </div>
</div>


</div>
</form>

@endsection