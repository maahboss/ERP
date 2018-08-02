@extends('layouts.app')

@section('content')

    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">

      
      

      <!-- Example row of columns -->
      <div class="row col-md-12 col-lg-12 col-sm-12">
      <form method="post" action="{{route('letters.store')}}">
               {{ csrf_field() }}
               
               <div class="form-group">
                <label for="letter-date">Date<span class="required">*</span></label>
                <input placeholder="Enter The Date :"
                       id="letter-date"
                       name="date"
                       spellcheck="false"
                       class="form-control"
                       
                        />

               </div>


               <div class="form-group">
                <label for="letter-title">Title</label>
                <input placeholder="Enter The Title :"
                       id="letter-title"
                       name="title"
                       spellcheck="false"
                       class="form-control"
                       
                        />

               </div>

               <div class="form-group">
                <label for="letter-subject">Subject</label>
                <textarea placeholder="Enter The Subject :"
                       style="resize: vertical"
                       id="letter-subject"
                       name="subject"
                       rows="5" spellcheck="false"  
                       class="form-control autosize-target text-left">
                       
                </textarea>

               </div>





               <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Submit"/>
               </div>
      </form>           



      	 
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
              
              <li><a href="/letters">All Letters</a></li>
              
            </ol>
          </div>
          
          
        </div>
      

      
    

  
            

@endsection