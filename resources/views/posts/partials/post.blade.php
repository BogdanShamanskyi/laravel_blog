<div class="blog-post mb-0">
	<h2 class="blog-post-title"><a href="{{ route('posts.show', $post) }}">{{ $post->name ?? '' }}</a></h2>
	<div class="d-flex justify-content-between">
	    <nav aria-label="breadcrumb">
		  <ol class="breadcrumb">

			    <li class="breadcrumb-item">
			    	<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Created:&nbsp;{{ $post->updated_at->format('M d, Y') }}
			    </li>

		  	@foreach($post->categories as $category)
			   	<li class="breadcrumb-item">
			   	 	<a href="{{ route('categories.show', $category) }}">
			   	 		{{ $category->name ?? '' }}
			   	 	</a>
			   	</li>
		    @endforeach
		  </ol>
		</nav>
		<div>
			<form onsubmit="if(confirm('Are you sure aboute this?')){return true}else{return false}"
				  action="{{ route('posts.destroy', $post) }}"
				  method="post">

				{{ csrf_field() }}
				<input type="hidden" name="_method" value="DELETE">
				<a href="{{route('posts.edit', $post)}}" class="btn btn-primary">
					Edit&nbsp;<i class="fa fa-edit"></i>
				</a>
				<button type="submit" class="btn">
					Delete&nbsp;<i class="fa fa-trash-o"></i>
				</button>
			</form>

		</div>
	</div>

	@if(isset($content))
		<p>{{ $content }}...</p>
	@else
		<p>{{ $post->content ?? '' }}</p>
	@endif

	@if($post->file)
		<p class="text-right">
			<a href="{{ asset('postsfiles') }}/{{ $post->file }}"
			   download="{{ $post->file }}"
			   class="btn btn-warning">
				<i class="fa fa-file"></i>&nbsp;Download file
			</a>
		</p>
	@endif
</div><hr>

	