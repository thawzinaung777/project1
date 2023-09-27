@extends('layouts.frontendmaster')

@section('content')
<style>
    body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
</style>
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
          
              <div class="card">
             
                <div class="card-body">
              
                  <div class="d-flex flex-column align-items-center text-center">
                 
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                  
                      <h4>{{$user->name}}</h4>
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                      <button class="btn btn-primary"><a href="{{url('home_edit')}}">Edit</a></button>
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                   
                  </div>
                 
                </div>
                
              </div>
              
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Full Name</h6>
                    <span class="text-secondary">{{$user->name}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Email</h6>
                    <span class="text-secondary">{{$user->email}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Phone</h6>
                    <span class="text-secondary">{{$user->phone}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Email</h6>
                    <span class="text-secondary">{{$user->address}}</span>
                  </li>
                 
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-header bg-warning">
                    <h6 class="mb-0 bg-warning"> Order History  </h6>
                </div>
                <div class="card-body">
                 
               

               
                

                  @foreach($orders as $order)

                  <div class="accordion" id="accordionExample">
                  <div class="row col-lg-12">
                  
                 
                        <div class="card col-lg-12">
                            <div class="card-header col-lg-12" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link form-control" type="button" data-toggle="collapse" data-target="#collapseOne{{substr($order->orderid,1)}}" aria-expanded="true" aria-controls="collapseOne">
                                Order ID: {{$order->orderid}}
                                </button>
                            </h2>
                            </div>
                            </div>

                            <div id="collapseOne{{substr($order->orderid,1)}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">   Order Date : {{$order->order_date}}  </li>
                                    <li class="list-group-item">   Order List : {{$order->order_list}}  </li>
                                    <li class="list-group-item">   Order Total : {{$order->total}}  </li>
                                
                                </ul>
                                
                            </div>
                            </div>
                        </div>


                        </div>
                        
                        </div>
                        @endforeach

                   
                     
                

               
                  
            
           
           

            </div>
          </div>

        </div>
    </div>
@endsection
