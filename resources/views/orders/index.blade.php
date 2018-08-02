
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
		       <input type="submit" value="search" id="bot">
            </form>

     <!--       <div id="div1" style="display:none;" > -->



				  @foreach($orders as $order)
				    <li class="list-group-item"><a href="/orders/{{$order->id}}"> {{ $order->number}}</a></li>

				    <a   href="/orders/{{$order->id}}">
		                   <input type="submit" value="Details" />
		            </a>

				  @endforeach

          <!--  </div>  -->
		   
		  </ul>

            {{ $orders->links() }}
		  </div>
		</div>
	</div>
<!--
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){
		    $("#bot").click(function(){
		        $("#div1").fadeIn();
		        
		    });
		});
		</script> -->

@endsection

