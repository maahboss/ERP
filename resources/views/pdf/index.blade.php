
@extends('layouts.app')
@section('content')

 
	<div class="col-md-6-col-lg-6">
		<div class="panel panel-primary ">
		  <div class="panel-heading">Letters <li><a class="pull-right btn btn-primary btn-sm" href="/letters/create">Add New Letter</a></li> </div>
		  <div class="panel-body">
		    
		  <ul class="list-group">

		  	<form action="/letters">
    	        {{ csrf_field() }}
    	       <input type="text" name="search">
		       <input type="submit" value="search">
            </form>

		  @foreach($letters as $letter)
		    <li class="list-group-item"><a href="/letters/{{$letter->id}}"> {{ $letter->title}}</a></li>

		    <a   href="/letters/{{$letter->id}}">
                   <input type="submit" value="Details" />
            </a>

            <a   href="/pdf/gnt/{{$letter->id}}">
                   <input type="submit" value="pdf" />
            </a>

		  @endforeach
          
          	
          
		  
		  </ul>
            {{ $letters->links() }}

		  </div>
		</div>
	</div>

@endsection

