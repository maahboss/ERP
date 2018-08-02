<!DOCTYPE html>
<html>
<head>

	<title> sens. search </title>

    <link  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

</head> 

<body>

	<div class="col-md-6-col-lg-6">
		<div class="panel panel-primary ">
		  <div class="panel-heading">Letters <li><a class="pull-right btn btn-primary btn-sm" href="/letters/create">طnew</a></li> </div>
		  <div class="panel-body">
		    
		  <ul class="list-group">

		  	<form action="/letters">
    	        {{ csrf_field() }}
    	       <input type="text" id="search" name="search">
		       <input type="submit" value="search">
            </form>

		  @foreach($letters as $letter)
		   
           <div class="panel panel-primary ">
		    <li class="list-group-item"><a href="/letters/{{$letter->id}}"> {{ $letter->title}}</a>

                 <div class="pull-right  btn-md">
		            <a  href="/letters/{{$letter->id}}">
		                   <input type="submit" value="Details" />
		            </a>

				    <a   href="/letters/print/{{$letter->id}}">
		                   <input type="submit" value="print" />
		            </a>

                 </div>

		    </li>
            </div>
		    

            

		  @endforeach
          
          	
          
		  
		  </ul>
            {{ $letters->links() }}

		  </div>
		</div>
	</div>





  <script type="text/javascript">
  	
  	$('#search').on('keyup',function(){
  		alert('test');
  	})

  </script>
	
</body>

</html>