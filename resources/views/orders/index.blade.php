@extends('layouts.master')
@section('content')
<div class="container my-4">
	<div class="row">
		<div class="col-lg-6">{{$orders->links()}}</div>
		<div class="col-sm-6">
			<form action="#" method="post" enctype="multipart/form-data" class="d-flex justify-content-end">
				@csrf
				<input type="text" name="search">
				<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
			</form>
		</div>
	</div>
</div>
<div class="container" style="padding-right: 50px;">
	<table class="table table-striped" >
		<tr>
			<td>Orderid</td>
			<td>Orderlist</td>
			<td>Orderdate</td>
			<td>total</td>
			<td>Actions </td>
		</tr>
		@foreach($orders as $order)
		<tr>
			<td>{{$order->orderid}}</td>
			<td>{{$order->order_list}}</td>
			<td>{{$order->order_date}}</td>
			<td>{{$order->total}}</td>

			<td>
				 <div class="row">
				<div class="col-sm-6">
			<a href="{{route('orders.show',$order->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i>Detail</a>
				</div>
				<div class="col-sm-6">
			
			<form class="inline-form" action="{{route('orders.destroy',$order->id)}}" method="post">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
			</form>
				</div>
			</div>
			</td>
			
		</tr>
		@endforeach
	</table>

</div>
<div class="container">
	{{$orders->links()}}
</div>
@endsection('content')