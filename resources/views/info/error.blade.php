@if(count($errors))
 <div class="alert alert-dismissable alert-danger">
   <button type="button" class="close" name="button" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
     <ul class="form-group">
       @foreach($errors->all() as $error)
         <li><strong>{{$error}}</strong></li>
       @endforeach
     </ul>
 </div>
@endif
