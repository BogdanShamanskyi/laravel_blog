@extends('app')

@section('content')
	<form class="col-md-8" method="POST" action="{{route('posts.update', $post)}}" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="put">
	  {{ csrf_field() }}
	  <div class="form-group text-center">
	    <h1>Edit #{{$post->id}} post</h1>
	  </div>
	  {{$form_check = false}}
	  @include('posts.partials.form')
	</form>
@endsection