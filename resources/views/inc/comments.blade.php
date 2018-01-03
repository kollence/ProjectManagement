@if(count($comments))
<div class="row">
  <div class="col-md-12">

          <!-- Fluid width widget -->
        <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">
                      <span class="glyphicon glyphicon-envelope"></span> 
                      Recent Comments
                  </h3>
              </div>
              <div class="panel-body">
                  <ul class="media-list">
                    @foreach($comments as $comment)
                      <li class="media">
                          <div class="media-left">
                              <img src="http://placehold.it/60x60" class="img-circle">
                          </div>
                          <div class="media-body">
                              <h4 class="media-heading">
                                  by <a href="users/{{$comment->user->id}}">{{$comment->user->name}} <small>{{$comment->user->first_name}} {{$comment->user->last_name}}</small></a>
                                  <br>
                                  <small>
                                      Proof: <a href="#">{{$comment->url}}</a>
                                  </small>
                              </h4>
                              <p>
                                {{$comment->body}}
                              </p>
                          </div>
                      </li>
                      @endforeach
                  </ul>
                  <a href="#" class="btn btn-default btn-block">More Events »</a>
              </div>
          </div>
          <!-- End fluid width widget -->

  </div>
</div>
@endif
