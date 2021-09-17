@extends('app')

@section('content')
	@include('layouts.sidebar')
	<div class="col-md-8 blog-main">
		@include('posts.partials.post')
		@include('layouts.comments')
	</div>
@endsection