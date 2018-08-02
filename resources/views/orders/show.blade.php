@extends('layouts.app')

@section('content')

  

    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">

      
      <div class="jumbotron">
        <h1>{{$order->number}}</h1>
        <p class="lead">{{$order->note}}</p>
        <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      </div> 

      <!-- Example row of columns -->
      <div class="row">
      <li><a href="/files/create/{{$order->id}}" class="pull-right btn btn-primary">Add New files</a></li>
      <li><a href="/images/create/{{$order->id}}" class="pull-right btn btn-primary">Add New files</a></li>
      	@foreach($order->files as $file)
	        <div class="col-lg-4">
	          <h2>{{ $file->name }}</h2>
	          <p class="text-danger"> {{$file->note}} </p>

            <div class="col-md-12 thumbnail" style="margin-left:20px;margin-bottom:30px;height:50%;width:50%; background-color:beige;">
            <a href="/uploads/{{$file->file}}" download="photo" class="pull-right btn btn-primary">
              <img src="/uploads/{{$file->file}}" />
            </a>
        </div>



	          <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
	        </div>
	    @endforeach
        </div>
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3 pull-right ">
         <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->

          <div class="sidebar-module">
            <h4>Manage</h4>
            <ol class="list-unstyled">
              <li><a href="/orders/{{ $order->id}}/edit/">Edit</a></li>
              <li><a href="/files/create/{{$order->id}}">Add New files</a></li>
              <li><a href="/orders">List of Orders</a></li>
              <li><a href="/orders/create">Add New Order</a></li>

              	<a 
              	href="#"
              	  onclick="
              	   var result = confirm('Are you sure you want to Delete') ;
              	     if (result){
              	     	  event.preventDefualt();
              	     	  document.getElementById('delete-form').submit();
              	     }
              	  " 
              	>
              	Delete 		
              	</a>
              	<form id="delete-form" action="{{route('orders.destroy',[$order->id]) }}"
              		method="POST" style="display: none; ">
              		   <input type="hidden" name="_method" value="delete">
              		      {{ csrf_field() }}
                </form>





              </li>


              
            </ol>
          </div>
          





          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          
        </div>
      

      
    

  
            

@endsection