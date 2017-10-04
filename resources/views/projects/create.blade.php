@extends('layouts.app')
@section('content')
<div class="col-md-9 col-lg-9 col-sm-3 pull-left">


   <!-- Example row of columns -->
   <div class="row">
     <div class="col-sm-12 text-center"><h2>Add Project</h2></div>
     <div class="col-lg-12 col-sm-12">

       <form method="post" action="{{route('projects.store')}}">
         {{csrf_field()}}
         @if($companies == null)
         <input type="hidden" name="company_id" value="{{$company_id}}">
         @endif
          <div class="form-group">

            <label for="project-name">Name of Project</label>
            <input type="text" class="form-control" id="project-name" name="name" placeholder="Enter project name" value="" required>

          </div>
          <div class="form-group">

            <label for="project-desc">Description of Project</label>
            <textarea class="form-control" id="project-desc" name="desc" rows="3" placeholder="Enter description" required></textarea>

          </div>
          @if($companies != null)
          <div class="form-group">
            <label for="company-content">Select Company</label>
            <select class="form-control" name="company_id">
              @foreach($companies as $company)
              <option value="{{$company->id}}">{{$company->name}}</option>
              @endforeach
            </select>
          </div>
          @endif
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
              <li><a href="/projects">My Projects</a></li>
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
