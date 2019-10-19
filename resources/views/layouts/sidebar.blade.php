<aside class="col-md-3 blog-sidebar mr-2">

    <h4 class="text-center m-3"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Categories</h4>
    <ul class="list-group">
      @foreach($categories as $category)
        <li class="list-group-item"><h6 class="mt-2 pl-4"><a href="{{route('categories.show', $category)}}" class=""><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;{{$category->name}}</a></h6></li>
      @endforeach
    </ul>

</aside>