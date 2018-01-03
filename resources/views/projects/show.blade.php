@extends('layouts.app')
@section('content')
<div class="col-md-9 col-lg-9 col-sm-9 pull-left">





   <!-- Jumbotron -->
   <div class="well">
     <h1>{{$project->name}}</h1>
     <p class="lead">{{$project->desc}}, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
     <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>
   </div>

   <!-- Example row of columns -->
   <div class="row col-lg-12 col-sm-12">
<a href="#comments" class="pull-right btn btn-default btn-sm">Add Comment</a>
<hr>
<!-- comments -->
@include('inc/comments')
<div class="row container-fluid" id="comments">
  <form method="POST" action="{{route('comments.store')}}">
    {{csrf_field()}}
         <input type="hidden" name="commentable_type" value="App\Project">
         <input type="hidden" name="commentable_id" value="{{$project->id}}">

     <div class="form-group">
       <label for="company-desc">Add comment</label>
       <textarea class="form-control autosize-target" id="comment" name="body" rows="3"  placeholder="Enter comment"></textarea>
     </div>
     <div class="form-group">
       <label for="url">Proof of work done (url/photo)</label>
       <textarea class="form-control autosize-target" id="url" name="url" rows="2"  placeholder="Enter url/photo"></textarea>
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
              <li><a href="/projects"><i class="fa fa-list-alt" aria-hidden="true"></i> List of Projects</a></li>
              <li><a href="/projects/{{$project->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></li>
              <li><a href="/projects/create/{{$project->company->id}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Project</a></li>
@if($project->user_id == Auth::user()->id)
              <li><a href="#" onclick="var res = confirm('Are you sure you want to delete project');
                                        if(res){
                                         event.preventDefault();
                                         document.getElementById('for-delete').submit();
                                        }"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                              <form id="for-delete" action="{{route('projects.destroy',[$project->id])}}" method="post" style="display:none;">
                                   {{csrf_field()}}
                                   <input type="hidden" name="_method" value="DELETE">
                              </form>
              </li>
@endif
            </ol>
          </div>
          <hr><!-- add user for project -->
               <div class="sidebar-module">
                 <h4 class="">Add Users</h4>
                 <div class="col-lg-12 nopadding">
                   <form id="add-user" action="{{route('projects.addUser')}}" method="post">
                         {{csrf_field()}}
                     <input type="hidden" name="project_id" value="{{$project->id}}">
                    <div class="input-group">
                      <input type="text" class="form-control" name="email" placeholder="add email ..." aria-label="add user...">
                      <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">Add!</button>
                      </span>
                    </div>
                  </form>
                  </div>
               </div>
           <br>
           <hr>
           <div class="sidebar-module">
             <h4>Team Members</h4>
             <ol class="list-unstyled">
               @foreach($project->users as $user)
               <li><a href="#">{{$user->name}}</a></li>
               @endforeach
             </ol>
           </div>
 </div>
@endsection
