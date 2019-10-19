@if ($errors->any())
    <div class="alert alert-danger mb-2">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
	<label for="postname">Post title</label>
	<input class="form-control form-control-lg" type="text" name="name" id="postname" value="@if($errors->any()){{old('name')}}@else{{$post->name ?? ''}}@endif">
</div>

<div class="form-group">
	<label for="ControlSelectCategories">Choose one or more categories( use ctrl )</label>
    <select multiple class="form-control" name="categories[]" id="ControlSelectCategories">
      @foreach($categories as $category)
        <option value="{{$category->id}}"
        	@if(isset($post))
	        	@foreach($post->categories as $post_category)
	        		@if($category->id == $post_category->id) selected='selected' @endif
	        	@endforeach
        	@endif
        	>{{$category->name}}</option>
      @endforeach
    </select>
</div>

<div class="form-group">
	<label for="">Description post</label>
	<textarea class="form-control" name="content" placeholder="Here Description" rows="3">@if($errors->any()){{old('content')}}@else{{$post->content ?? ''}}@endif</textarea>
</div>

<div class="form-group">
	<label for="">Add file</label>
	<input name='file' type="file" class="form-control-file">
</div>

@if(isset($form_check))
<div class="form-check">
    <input type="checkbox" name="check_delete_old" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Delete old file</label>
</div>
@endif

<div class="form-group text-center">
	<button class="btn btn-primary ">Submit</button>
</div>