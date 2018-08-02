@extends('layouts.app')

@section('content')

  

    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">

      
      <div class="jumbotron">

        <h1>{{$letter->title}}</h1>
        <h3>{{$letter->date}}</h3>
        <p class="lead">{{$letter->subject}}</p>
        <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      </div> 

      <!-- Example row of columns -->
      <div class="row">
      <li><a href="/letters/addsame/{{$letter->id}}" class="pull-right btn btn-primary">Add New letter with same subject</a></li>
      	
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
              <li><a href="/letters/{{ $letter->id}}/edit/">Edit</a></li>
              <li><a href="/letters/create/">Add New letter</a></li>
              <li><a href="/letters">List of Orders</a></li>
              

              	





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