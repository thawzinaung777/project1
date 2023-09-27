@extends('layouts.master')
@section('content')
<!--conter-->
<div class="container py-4 my-4 mx-auto d-flex flex-column">
    <div class="header">
        <div class="row r1">
            <div class="col-md-9 abc">
                <h1> Product Details </h1>
            </div>
           
        </div>
    </div>
    <div class="container-body mt-4">

        <div class="row r3">
            <div class="col-md-5 p-0 klo">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$product->category}}</li>
                    <li class="list-group-item">{{$product->name}}</li>
                    <li class="list-group-item">{{$product->price}}</li>
                    
                
                    <li class="list-group-item"><a href="#" >Feature &nbsp;&nbsp; 

                        @if($product->feature==1)
                        <button class="btn btn-info"> On </button> 
                        @else
                        <button class="btn btn-danger"> Off </button>
                        @endif

                        &nbsp;&nbsp;
                        <a href="{{route('updateFeature',$product->id)}}"> <i class="fa fa-refresh"> Update </i> </a>

                    </li>
                     <li class="list-group-item"><a href="#" >Recent  &nbsp;&nbsp; 

                         
                        @if($product->recent==1)
                        <button class="btn btn-info"> On </button> 
                        @else
                        <button class="btn btn-danger"> Off </button>
                        @endif

                         &nbsp;&nbsp;
                        <a href="{{route('updateRecent',$product->id)}}"> <i class="fa fa-refresh"> Update </i> </a>

                    </li>
                </ul>
            </div>
            <div class="col-md-7"> <img src="{{asset('images')}}/{{$product->photo}}" width="70%" height="70%"> </div>
        </div>
       
    </div>
  
</div>
<!--footer-->

@endsection('content')