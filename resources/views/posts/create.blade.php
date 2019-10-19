@extends('app')

@section('content')
	<form class="col-md-8" method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
	  {{ csrf_field() }}
	  <div class="form-group text-center">
	    <h1>Create new post</h1>
	  </div>

	  @include('posts.partials.form')
	</form>
@endsection