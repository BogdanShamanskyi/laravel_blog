<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between pt-2">
      <div >
          <h2><a class="text-dark" href="{{ url('/') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;BlogNote</a></h2>
      </div>

      <div class="mr-4">
        <h5 data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><a  href="#" class="nav-link active dropdown-toggle"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;ADD</a></h5>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('posts.create')}}"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Post</a>
            <a class="dropdown-item" href="{{route('categories.create')}}"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Category</a>
          </div>
      </div>

      <div >
        <h5><a class="nav-link active" href="{{route('posts.index')}}"><i class="fa fa-files-o" aria-hidden="true"></i>&nbsp;Posts</a> </h5>
      </div>

      <div class="mr-0">
         <h5><a class="nav-link active" href="{{route('categories.index')}}"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Categories</a> </h5>
      </div>
</header>
<br>