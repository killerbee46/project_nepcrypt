@extends('frontend.encro')
@section('crypto')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="white_table">
<table class="table" border="1">Your Encryption History</table>
<tr>
    <th>Id</th>
    <th>Plain Text</th>
    <th>Key</th>
    <th>Encrypted Text</th>
</tr>
<tr>
    <th>Id</th>
    <th>Plain Text</th>
    <th>Key</th>
    <th>Encrypted Text</th>
</tr>
</div>
<div class="white_table" border="1">
<table class="table">Your Decryption History</table>
<tr>
    <th>Id</th>
    <th>Cipher Text</th>
    <th>Key</th>
    <th>Decrypted Text</th>
</tr>
<tr>
    <th>Id</th>
    <th>Plain Text</th>
    <th>Key</th>
    <th>Encrypted Text</th>
</tr>
</div>
@endsection