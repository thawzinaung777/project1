@extends('layouts.master')

@section('content')
	<!--Header -->
	



    <!--Contents   -->
	<div class="container">
	
		<div class="row col-lg-4">
			
				<form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group m-3">
					<input type="text" name="name" class="form-control mb-3" placeholder="Enter Name">
					</div>
					<div class="form-group m-3">
					<input type="file" name="photo" class="form-control mb-3" placeholder="Enter photo">
					</div>
					<div class="form-group m-3">
					<button type="submit" class="btn btn-primary form-control mb-3"><i class="fa fa-save"></i> Save</button>
					</div>
				</form>
		
		</div>
		
	</div>

	@endsection('content')