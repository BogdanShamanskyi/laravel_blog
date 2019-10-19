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
	<label for="">Category name</label>
	<input class="form-control form-control-lg" type="text" name="name"  value="@if($errors->any()){{old('name')}}@else{{$category->name ?? ''}}@endif">
</div>

<div class="form-group">
	<label for="">Description category</label>
	<textarea class="form-control" name="description" placeholder="Description" rows="3">@if($errors->any()){{old('description')}}@else{{$category->description ?? ''}}@endif</textarea>
</div>

<div class="form-group text-center">
	<button class="btn btn-primary ">Submit</button>
</div>