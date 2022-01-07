@extends('frontend.encro')
@section('crypto')

<script src="../../essential/aes.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"
    integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script>
function decrypt() {
        var deckey = document.getElementById('deckey').value;
        var etext = document.getElementById('encoded').value;
        var decrypted = CryptoJS.AES.decrypt(etext, deckey);
        document.getElementById('plain').value = decrypted.toString(CryptoJS.enc.Utf8);
    }
</script>
<div class="row">
    <div class="col-md-6">
        <div class="instruction">
            Enter encoded ciphertext here...
        </div>
        <div>
            <textarea class="encoded" id='encoded' style="width: 100%;height:60vh"></textarea>
        </div>
            <span style="color: aliceblue;">Enter Key here:</span>
            <input type="text" name='deckey' id='deckey'>
            <button class="btn btn-warning" onclick="decrypt()">DECRYPT</button>
    </div>
    <div class="col-md-6">
        <div class="instruction">
            See plain text here...
        </div>
        <div>
            <Textarea class="plain" id='plain' style="width: 100%;height:60vh"></Textarea>
        </div>
    </div>
</div>


</div>


@endsection