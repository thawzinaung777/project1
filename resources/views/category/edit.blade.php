@extends('layouts.master')
@section('content')

 <!--Contents   -->
	<div class="container">
		<a href="{{route('category.index')}}"> <i class="fa fa-list"></i> Category</a> / Edit
	</div>
    <!--Contents   -->
	<div class="container">
	
		<div class="row">
			<div class="col-lg-6 text-center text-white p-5">
				<i class="fa fa-list" style="color: orange;font-size:100px;"></i>
			</div>
			<div class="col-lg-4 p-5">
				<form action="{{route('category.update',$category->id)}}" method="post">
					@csrf
					@method('PATCH')
					<input type="text" name="name" class="form-control mb-3" value="{{$category->name}}" enctype="multipart/form-data">
					<ul class="list-group">
						<li class="list-group-item"><img src="{{asset('images')}}/{{$category->photo}}" style="with: 50px;height: 50px;"></li>
					</ul>
					<input type="text" name="curr_photo" class="form-control mb-3" value="{{$category->photo}}">
					<input type="file" name="new_photo" class="form-control mb-3" vlaue="{{$category->photo}}">
					<button type="submit" class="btn btn-primary form-control mb-3"><i class="fa fa-refresh"></i> Update </button>
				</form>
			</div>
		</div>
		
	</div>

	<!--Footer   -->
	
	@endsection('content')