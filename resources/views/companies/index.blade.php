@extends('layouts.app')
@section('title','Companies')
@section('content')
  <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Companies <a href="/companies/create" class="pull-right btn btn-success btn-sm">Crate new Company</a></h3>
      </div>
      <div class="panel-body">
        <ul class="list-group">
          @foreach($companies as $company)
          <li class="list-group-item">
            <a href="{{route('companies.show',$company->id)}}">
              {{$company->name}}
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endsection
