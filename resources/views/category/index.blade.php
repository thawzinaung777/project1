
@extends('layouts.master')
@section('content')
	<div class="container my-4">
		<a href="{{route('category.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Category </a>
	</div>

	<div class="container my-4">
	<div class="row">
		<div class="col-lg-6">	{{$categories->links()}}</div>
		<div class="col-lg-6" >
			
			<form action="{{route('category.search')}}" method="post" class="d-flex justify-content-end" enctype="multipart/form-data">
				@csrf
				<input type="text" name="search">
				<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search </button>
			</form>

		</div>
	</div> 

</div>

 
    <!--Contents   -->
	<div class="container my-4 p-4">
		<table class="table table-striped">
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Photo</td>
				<td> Actions </td>
			</tr>
			@foreach($categories as $cat)

             <tr>
				<td>{{$cat->id}}</td>
				<td>{{$cat->name}}</td>
				<td><img src="{{asset('images')}}/{{$cat->photo}}" style="width: 50px;height: 50px;">
				<td class="d-flex justify-content">
					<a href="{{route('category.edit',$cat->id)}}" class="btn btn-primary"> <i class="fa fa-pencil"></i> Edit </a> &nbsp;&nbsp;
					<form action="{{route('category.destroy',$cat->id)}}" method="post" enctype="multipart/form-data">
						@csrf 
						@method('DELETE')
					<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button> &nbsp;&nbsp;
				</form>
				</td>
			</tr>

			@endforeach
		</table>
		
	</div>
     <div class="container">
		{{$categories->links()}}
	 </div>
	@endsection('content')