@extends('admin.master')

@section('content')
	<div class="row">
		<div class="col-md-6" style="text-align: center;">
			<div class="col-md-10" style="background-color: rgb(70, 70, 70);">
				<p>Posts:</p>
				<h4>4</h4>
			</div>
		</div>
		<div class="col-md-6" style="text-align: center;">
			<div class="col-md-10" style="background-color: rgb(70, 70, 70);">
				<p>Users:</p>
				<h4>4</h4>
			</div>
		</div>
	</div>


	<div class="row" style="margin-top: 20px;">
		<h2 style=" color: antiquewhite;">Users:</h2>
		<div class="col-md-12" style="text-align: center;">
			<div class="col-md-6" style="background-color: rgb(202, 143, 143); color: black;">
				<p>Admins</p>
				<h4 style=" color: black;">4</h4>
			</div>
		</div>
		<div class="col-md-12" style="text-align: center;">
			<div class="col-md-6" style="background-color: rgb(138, 130, 206); color: black;">
				<p>Bloggers</p>
				<h4 style=" color: black;">4</h4>
			</div>
		</div>
		<div class="col-md-12" style="text-align: center;">
			<div class="col-md-6" style="background-color: rgb(196, 184, 133); color: black;">
				<p>Normal User</p>
				<h4 style=" color: black;">4</h4>
			</div>
		</div>
	</div>
	
@stop