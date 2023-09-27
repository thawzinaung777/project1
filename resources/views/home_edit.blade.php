@extends('layouts.master')

@section('content')


<!--conter-->
<div class="container">
	<a href="{{route('products.index')}}"><i class="fa fa-list"></i> Product</a> /Edit
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-6 text-center p-5">
			<i class="fa fa-list" style="color:orange;font-size:100px;"></i>
		</div>
		<div class="col-lg-6 mb-4 p-5">
			<form action="{{route('home_edit.update',$product->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
			<input type="text" name="name" value="{{$user->name}}" class="form-control mb-3">
			<input type="text" name="email" class="form-control mb-3" value="{{$user->email}}" >
			<input type="text" name="phone" value="{{$user->phone}}" class="form-control mb-3">
			<input type="text" name="address" value="{{$user->address}}" class="form-control mb-3">
			
			<button type="submit" class="btn btn-primary form-control mb-3"><i class="fa fa-refresh"></i> Update</button>
			</form>
		</div>
	</div>
</div>
<!--footer-->

@endsection('content')