@extends('layouts.master')
@section('content')
<!--conter-->
<div class="container my-4">
		<div class="col-lg-6">
			<a href="{{route('products.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add New Product</a>
		</div>
</div>
<div class="container my-4">
	<div class="row">
		<div class="col-lg-6">	{{$products->links()}}</div>
		<div class="col-lg-6" >
			
			<form action="{{route('products.search')}}" method="post" class="d-flex justify-content-end" enctype="multipart/form-data">
				@csrf
				<input type="text" name="search">
				<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search </button>
			</form>

		</div>
	</div> 

</div>

<div class="container">
			<table class="table table-striped">
				<tr>
					<td>ID</td>
					<td>Category</td>
					<td>Name</td>
					<td>Price</td>
					<td>Photo</td>
					<td>Action</td>
				</tr>
				@foreach($products as $product)
				<tr>
					<td>{{$product->id}}</td>
					<td>{{$product->category}}</td>
					<td>{{$product->name}}</td>
					<td>{{$product->price}}</td>
					<td><img src="{{asset('images')}}/{{$product->photo}}" style="width: 60px;height: 60px;"> </td>
					<td class="d-flex flex-row-reverse">
						
						<a href="{{route('products.show',$product->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i>Details</a>&nbsp;&nbsp;
						<a href="{{route('products.edit',$product->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i>Edit</a>&nbsp;&nbsp;
						<form action="{{route('products.destroy',$product->id)}}" method="post">
							@csrf
							@method('DELETE')
						<button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i>Delete</button>&nbsp;&nbsp;
						</form>
					
					</td>
				</tr>
		
			@endforeach

				</table>
		</div>

<div class="container my-4">
	{{$products->links()}}
</div>

<!--footer-->
@endsection('content')