@extends('layouts.app')

@section('content')

    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">

      
      

      <!-- Example row of columns -->
      <div class="row col-md-12 col-lg-12 col-sm-12">
      <form method="post" action="{{route('orders.store')}}">
               {{ csrf_field() }}
               
               <div class="form-group">
                <label for="order-number">Number<span class="required">*</span></label>
                <input placeholder="Enter The Number :"
                       id="order-number"
                       required
                       name="number"
                       spellcheck="false"
                       class="form-control"
                       
                        />

               </div>


               <div class="form-group">
                <label for="order-year">Year</label>
                <input placeholder="Enter The Year :"
                       id="order-year"
                       name="year"
                       spellcheck="false"
                       class="form-control"
                       
                        />

               </div>

               <div class="form-group">
                <label for="order-com-name">Company Name</label>
                <input placeholder="Enter The company name :"
                       id="order-com-name"
                       name="com_name"
                       spellcheck="false"
                       class="form-control"
                       
                        />

               </div>







               <div class="form-group">
                <label for="order-note">Note</label>
                <input placeholder="Enter The Year :"
                       id="order-note"
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
              
              <li><a href="/orders">All Orders</a></li>
              
            </ol>
          </div>
          
          
        </div>
      

      
    

  
            

@endsection