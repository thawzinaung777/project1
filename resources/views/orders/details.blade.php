@extends('layouts.master')
@section('content')
<div class="container">
	<h1>Order Detail</h1>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<ul class="list-group list-group-flush">
				<li class="list-group-item"> Order ID : {{$order->orderid}}</li>
				<li class="list-group-item">
					@php 
					$items=explode("-",$order->order_list);

					echo "<ul class='list-group list-group-flush'>";
					echo "<li class='list-group-item active'> Order List </li>";

					foreach($items as $item){

						echo '<li class="list-group-item">'.$item.'</li>';

					}

					echo "</ul>";

					@endphp
                  
				</li>
                <li class="list-group-item active">Order Total : {{number_format($order->total,2)}} Ks </li>
				
				
			</ul>
		</div>
		 <div class="col-lg-6">
		 	<ul class="list-group list-group-flush">
		 		<li class="list-group-item">Customer Name : {{$order->customer_name}}</li>
		 		<li class="list-group-item">Customer Email : {{$order->customer_email}}</li>
		 		<li class="list-group-item">Customer Phone : {{$order->customer_phone}}</li>
		 		<li class="list-group-item">Customer Adress : {{$order->customer_address}}</li>
		 		<li class="list-group-item">Payment Type : {{$order->payment_type}}</li>
		 		<li class="list-group-item">Payment Recipt : {{$order->payment_recipt}}</li>
		 		@if($order->payment_type=="Cash on Deli")
		 		<li class="list-group-item"><img src="{{asset('images')}}/cash.png" width="150px" height="auto">
		 		@else
		 		<li class="list-group-item"><img src="{{asset('images')}}/{{$order->photo}}" width="50%" height="50%">

		 		@endif
		 	</ul>
		 	
		 </div>
	</div>
	<div class="row">
    

	<div class="container px-1 px-md-3 py-1 mx-auto">
    <div class="card">
   
        <div class="row d-flex justify-content-between px-3 top">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#arrivalDateModal">
            Update Arrival Info
        </button>
         

            <!-- Button trigger modal -->
           

            
        </div>
        <div class="container my-4">
        <div class="row justify-content-between">
        <ul class="list-group" style="color:orange">
        <li class="list-group-item">AriderDate::{{$order->arrival_date}}</li>
            
        </ul>
        
        <ul class="list-group" style="color:orange">
            <li class="list-group-item " >OrderID::{{$order->orderid}}</li>
            
        </ul>
        <ul class="list-group" style="color:orange">
        <li class="list-group-item">AriderName::{{$order->rider_name}}</li>
            
        </ul>
        <ul class="list-group" style="color:orange">
        <li class="list-group-item">AriderContact::{{$order->rider_contact}}</li>
            
        </ul>
        </div>
        </div>
 
        <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
            <ul id="progressbar" class="text-center">

            @if($order->order_status=="none")
                <li class="step0"> <a href="{{route('orders.process',$order->id)}}"> Step01 </a> </li>
                <li class="step0"> <a href="{{route('orders.shipped',$order->id)}}"> Step02 </a> </li>
                <li class="step0"> <a href="{{route('orders.route',$order->id)}}">Step03 </a> </li>
                <li class="step0"> <a href="{{route('orders.arrived',$order->id)}}">Step04 </a> </li>
                @endif 
                @if($order->order_status=="processing")
                <li class="active step0"> <a href="{{route('orders.process',$order->id)}}"> Step01 </a> </li>
                <li class="step0"> <a href="{{route('orders.shipped',$order->id)}}">Step02</a> </li>
                <li class="step0"> <a href="{{route('orders.route',$order->id)}}">Step03 </a> </li>
                <li class="step0"> <a href="{{route('orders.arrived',$order->id)}}">Step04 </a> </li>
                @endif 
                @if($order->order_status == "shipping")
                <li class="active step0"> <a href="{{route('orders.process',$order->id)}}">Step01 </a> </li>
                <li class="active step0"> <a href="{{route('orders.shipped',$order->id)}}"> Step02 </a> </li>
                <li class="step0"> <a href="{{route('orders.route',$order->id)}}">Step03 </a> </li>
                <li class="step0"> <a href="{{route('orders.arrived',$order->id)}}">Step04 </a> </li>
                @endif
                @if($order->order_status=="route")

                <li class="active step0"> <a href="{{route('orders.process',$order->id)}}"> Step01 </a> </li>
                <li class="active step0"> <a href="{{route('orders.shipped',$order->id)}}"> Step02 </a> </li>
                <li class="active step0"> <a href="{{route('orders.route',$order->id)}}">Step03 </a> </li>
                <li class="step0"> <a href="{{route('orders.arrived',$order->id)}}">Step04 </a> </li>

                @endif

                @if($order->order_status=="arrived")
                <li class="active step0"> <a href="{{route('orders.process',$order->id)}}"> Step01 </a> </li>
                <li class="active step0"> <a href="{{route('orders.shipped',$order->id)}}"> Step02 </a> </li>
                <li class="active step0"> <a href="{{route('orders.route',$order->id)}}">Step03 </a> </li>
                <li class="active step0"> <a href="{{route('orders.arrived',$order->id)}}">Step04 </a> </li>
                @endif
            </ul>
            </div>
        </div>
        <div class="row justify-content-between top">
            <div class="row d-flex icon-content">
                <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Processed</p>
                </div>
            </div>
            <div class="row d-flex icon-content">
                <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Shipped</p>
                </div>
            </div>
            <div class="row d-flex icon-content">
                <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>En Route</p>
                </div>
            </div>
            <div class="row d-flex icon-content">
                <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Arrived</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<form action="{{route('orders.infoUpdate',$order->id)}}" method="get">
<div class="modal fade" id="arrivalDateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
       
      <div class="modal-header">
       Update Order Info
      </div>
      <div class="modal-body">
        <h5 class="modal-title fs-5" id="staticBackdropLabel">ArrivalDate</h5>
        <input type="date" name="arrival_date" class="form-control mb-4">
        <h5 class="modal-title fs-5" id="staticBackdropLabel">Rider Name:</h5>
        <input type="text" name="rider_name" class="form-control mb-3">
        <h5 class="modal-title fs-5" id="staticBackdropLabel" >Rider Contact:</h5>
        <input type="text" name="rider_contact" class="form-control mb-3">
      </div>
      <div class="modal-footer">
        <button type="text" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update </button>
      </div>
    </div>
  </div>
</div>
                </form>


@endsection('content')