@extends('app')

@section('content')

	@include('layouts.sidebar')
	<div class="col-md-8 blog-main">
		@forelse($posts as $post)
			<?php $content = mb_substr($post->content, 0, 400) ?>
			@include('posts.partials.post')
		@empty
			<h2 class="text-center text-muted">Here is empty yet</h2>
		@endforelse
		<div class="d-flex justify-content-center">
			<p>{{$posts->links()}}</p>
		</div><hr>

		@if(count($posts)) @include('layouts.comments') @endif
	
		<script src="{{ asset('js/comments-ajax.js') }}"></script>
	</div>


@endsection