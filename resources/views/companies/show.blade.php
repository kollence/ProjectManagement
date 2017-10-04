@extends('layouts.app')
@section('content')
<div class="col-md-9 col-lg-9 col-sm-3 pull-left">

   <!-- Jumbotron -->
   <div class="jumbotron">
     <h1>{{$company->name}}</h1>
     <p class="lead">{{$company->desc}}, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
     <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>
   </div>

   <!-- Example row of columns -->
   <div class="row">
     <div class="row"><a href="/projects/create/{{$company->id}}" class="pull-right btn btn-default btn-sm">Add Project</a><hr></div>
     @foreach($company->projects as $project)
     <div class="col-lg-4">
       <h2>{{$project->name}}</h2>
       <p>{{$project->desc}}, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
       <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View details &raquo;</a></p>
     </div>
     @endforeach
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
              <li><a href="/companies">List of Companies</a></li>
              <li><a href="/companies/create">Create Company</a></li>
              <li><a href="/companies/{{$company->id}}/edit">Edit</a></li>
              <li><a href="/projects/create/{{$company->id}}">Add Project</a></li>
              <li><a href="#" onclick="var res = confirm('Are you sure you want to delete company');
                                        if(res){
                                         event.preventDefault();
                                         document.getElementById('for-delete').submit();
                                        }">Delete</a>
                              <form id="for-delete" action="{{route('companies.destroy',[$company->id])}}" method="post" style="display:none;">
                                   {{csrf_field()}}
                                   <input type="hidden" name="_method" value="DELETE">
                              </form>
              </li>
            </ol>
          </div>
           <div class="sidebar-module">
             <h4>Users</h4>
             <ol class="list-unstyled">
               <li><a href="#">Users</a></li>
               <li><a href="#">Users</a></li>
               <li><a href="#">Users</a></li>
               <li><a href="#">Users</a></li>
             </ol>
           </div>
 </div>
@endsection
