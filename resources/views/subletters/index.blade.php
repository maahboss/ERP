
@extends('layouts.app')
@section('content')


	<div class="col-md-6-col-lg-6">
		<div class="panel panel-primary ">
		  <div class="panel-heading">Orders <li><a class="pull-right btn btn-primary btn-sm" href="/orders/create">Add New Order</a></li> </div>
		  <div class="panel-body">
		    
		  <ul class="list-group">

		  	<form action="/orders">
    	        {{ csrf_field() }}
    	       <input type="text" name="search">
		       <input type="submit" value="search">
            </form>

		  @foreach($orders as $order)
		    <li class="list-group-item"><a href="/orders/{{$order->id}}"> {{ $order->number}}</a></li>

		    <a   href="/orders/{{$order->id}}">
                   <input type="submit" value="Details" />
            </a>

		  @endforeach

		  
		  </ul>


		  </div>
		</div>
	</div>

@endsection

