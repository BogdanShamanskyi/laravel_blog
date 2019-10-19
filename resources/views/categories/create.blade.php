@extends('app')

@section('content')

	<form class="col-md-8" method="POST" action="{{route('categories.store')}}">
	  {{ csrf_field() }}

	  <div class="form-group text-center">
	    <h1>Create new category</h1>
	  </div>

	@include('categories.partials.form')
	</form>
@endsection