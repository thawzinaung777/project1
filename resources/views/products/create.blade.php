@extends('layouts.master')
@section('content')
<!--conter-->
<div class="container">
		
		<div class="col-lg-6 mb-3 p-5">
			<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
			<input type="text" name="name" placeholder="Enter Name" class="form-control mb-3"><br>
			<input type="text" name="price" placeholder="Enter price" class="form-control mb-3"><br>
			<select name="category" class="form-control mb-3">
				<option>-Choose Category-</option>
				@foreach($categories as $cat)
				<option value="{{$cat->name}}"> {{$cat->name}} </option>
				@endforeach
			</select><br>
			<input type="file" name="photo" class="form-control mb-3" placeholder="Enter photo" ><br>
			<button type="submit" class="btn btn-primary form-control mb-3"><i class="fa fa-save"></i>Save</button>
			</form>
		</div>
</div>
<!--footer-->

@endsection('content')