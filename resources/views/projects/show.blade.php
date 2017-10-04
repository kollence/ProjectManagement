@extends('layouts.app')
@section('content')
<div class="col-md-9 col-lg-9 col-sm-3 pull-left">

   <!-- Jumbotron -->
   <div class="well well-md">
     <h1>{{$project->name}}</h1>
     <p class="lead">{{$project->desc}}, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
     <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>
   </div>

   <!-- Example row of columns -->
   <div class="row col-lg-12 col-sm-12">
<a href="#comments" class="pull-right btn btn-default btn-sm">Add Comment</a>
<hr>
@foreach($project->comments as $comment)
<div class="col-lg-12">
  <div class="panel panel-default">
     <div class="panel-body"><b>{{$comment->body}}</b></div>
     <div class="panel-body">{{$comment->url}}</div>
   </div>
</div>
@endforeach
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
              <li><a href="/projects">List of Projects</a></li>
              <li><a href="/projects/{{$project->id}}/edit">Edit</a></li>
              <li><a href="/projects/create/{{$project->company->id}}">Add Project</a></li>
@if($project->user_id == Auth::user()->id)
              <li><a href="#" onclick="var res = confirm('Are you sure you want to delete project');
                                        if(res){
                                         event.preventDefault();
                                         document.getElementById('for-delete').submit();
                                        }">Delete</a>
                              <form id="for-delete" action="{{route('projects.destroy',[$project->id])}}" method="post" style="display:none;">
                                   {{csrf_field()}}
                                   <input type="hidden" name="_method" value="DELETE">
                              </form>
              </li>
@endif
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
