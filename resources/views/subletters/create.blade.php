@extends('layouts.app')

@section('content')

    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">

      
      

      <!-- Example row of columns -->
      <div class="row col-md-12 col-lg-12 col-sm-12">
      <form method="POST" action="{{ route('files.store') }}" enctype="multipart/form-data" >
               {{ csrf_field() }}
               
               <div class="form-group">
                <label for="file-name">Name<span class="required">*</span></label>
                <input placeholder="Enter The Name :"
                       id="file-name"
                       required
                       name="name"
                       spellcheck="false"
                       class="form-control"
                       
                        />

               </div>




               <label for="file-file">File</label>
               <input type="file" name="file" id="file-file" class="form-control" /> 

               



           <!--     <div class="form-group">
                <label for="file-file">File</label>
                <input placeholder="Enter The Year :"
                       id="file-file"
                       name="file"
                       spellcheck="false"
                       class="form-control"
                       
                        />   

               </div>   -->

               
               <input  class="form-control" 
                       type="hidden" 
                       name="order_id"
                       value="{{$order_id}}" 
                       
                        />

               


               <div class="form-group">
                <label for="file-note">Note</label>
                <input placeholder="Enter The company name :"
                       id="file-note"
                       name="note"
                       spellcheck="false"
                       class="form-control"
                       
                        />

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
              
              <li><a href="/files">All files</a></li>
              
            </ol>
          </div>
          
          
        </div>
      

      
    

  
            

@endsection