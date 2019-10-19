@extends('app')

@section('content')

<p>
	<a class="btn btn-primary" href="{{route('categories.create')}}">
		<i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Category
	</a>
</p>

<table class="table table-striped">
	<thead>
		<th><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Name</th>
		<th class="text-left"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Description</th>
		<th class="text-right"><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp;Action</th>
	</thead>
	<tbody>
		@forelse($categories as $category)
			<tr>
				<td><h5 class="mt-1"><a href="{{ route('categories.show', $category) }}"><i class="fa fa-list-alt" aria-hidden="true">&nbsp;{{$category->name}}</i>({{count($category->posts)}})</a></h5></td>
				<td class="text-left">{{$category->description}}</td>
				<td class="text-right">
					<form onsubmit="if(confirm('DELETE! OK?')){return true}else{return false}" action="{{route('categories.destroy', $category)}}", method="post">

						<input type="hidden" name="_method" value="DELETE">

						{{ csrf_field() }}

						<a href="{{route('categories.edit', $category)}}" class="btn btn-default">Edit&nbsp;<i class="fa fa-edit"></i></a>

						<button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>

					</form>
					
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="3" class="text-center">
					<h2 class="text-muted">Here empty yet</h2>
				</td>
			</tr>
		@endforelse
	</tbody>
	<tfoot>
		<tr>
			<td>#</td>
			<td colspan="3">
				<ul class="pagination pull-right">
					{{$categories->links()}}
				</ul>
			</td>
		</tr>
	</tfoot>
</table>

@endsection