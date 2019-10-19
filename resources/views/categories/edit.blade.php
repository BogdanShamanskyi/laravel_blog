@extends('app')

@section('content')
	<form class="col-md-8" method="POST" action="{{route('categories.update', $category)}}">
		<input type="hidden" name="_method" value="put">
	  {{ csrf_field() }}
	  <div class="form-group text-center">
	    <h1>Edit #{{$category->id}}&nbsp;{{$category->name}}</h1>
	  </div>

	@include('categories.partials.form')
	</form>
@endsection