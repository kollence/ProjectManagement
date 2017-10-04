@extends('layouts.app')
@section('content')
<div class="col-md-9 col-lg-9 col-sm-3 pull-left">


   <!-- Example row of columns -->
   <div class="row">
     <h2 class="text-center">Add new Company</h2>
     <div class="col-lg-12 col-sm-12">

       <form method="POST" action="{{route('companies.store')}}">
         {{csrf_field()}}
          <div class="form-group">
            <label for="company-name">Name of Company</label>
            <input type="text" class="form-control" id="company-name" name="name" placeholder="Enter name" value="">
          </div>
          <div class="form-group">
            <label for="company-desc">Description of Company</label>
            <textarea class="form-control" id="company-desc" name="desc" rows="3"  placeholder="Enter descrtiption"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>

     </div>
   </div>
 </div>
 <div class="col-sm-3 offset-sm-1 pull-right">
           <!-- <div class="sidebar-module sidebar-module-inset">
             <h4>About</h4>
             <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
           </div> -->
           <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">

              <li><a href="/companies">Back To Companies</a></li>
            </ol>
          </div>
           <!-- <div class="sidebar-module">
             <h4>Users</h4>
             <ol class="list-unstyled">
               <li><a href="#">Users</a></li>
               <li><a href="#">Users</a></li>
               <li><a href="#">Users</a></li>
               <li><a href="#">Users</a></li>
             </ol>
           </div> -->
 </div>
@endsection
