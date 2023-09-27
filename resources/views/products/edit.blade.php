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
			<form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
			<input type="text" name="name" value="{{$product->name}}" class="form-control mb-3">
			<input type="text" name="price" class="form-control mb-3" value="{{$product->price}}" >
			<input type="text" name="category" value="{{$product->category}}" class="form-control mb-3">
			<ul class="list-group">
			<li class="list-group-item"><img src="{{asset('images')}}/{{$product->photo}}" class="img-fluid" style="width:100px;height:auto;"> </li>
			</ul>
			<input type="text" name="curr_photo" class="form-control mb-3" value="{{$product->photo}}" >
			<input type="file" name="new_photo" class="form-control mb-3" value="{{$product->photo}}" >
			<button type="submit" class="btn btn-primary form-control mb-3"><i class="fa fa-refresh"></i> Update</button>
			</form>
		</div>
	</div>
</div>
<!--footer-->

@endsection('content')