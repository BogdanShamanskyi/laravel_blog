<!-- Comments FORM-->

<h2 class="text-center text-muted mb-3 mt-3">Write a comment</h2>

<form method="POST" id="commentform">
	{{csrf_field()}}
	
	<div class="form-group">
  		<input name="author" class="form-control form-control-lg" type="text" placeholder="Example name: Jon Doe">
	</div>

	<div class="form-group">
  		<textarea name="content" class="form-control" id="commentContent" rows="3" placeholder="What do you think?"></textarea>
	</div>

	<div class="form-group text-center">
  		<button class="btn btn-primary" type="submit" id="addComment">Submit</button>
	</div>
</form><hr>
<!-- END Comments FORM-->
<div class="comments"></div>

		