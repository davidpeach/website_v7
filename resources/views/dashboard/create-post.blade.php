@extends('layouts.dashboard')

@section('heading')
    <h1>Create a Post</h1>
@endsection

@section('content')
<div class="flex">
	<div>
		<form method="POST" action="{{ route('dashboard.post.store') }}" class="bg-gray-300 p-2">
			{!! csrf_field() !!}

			<div>
				<label for="title" class="block">Title</label>
				<input type="text" name="title" id="title" class="block w-full p-3">
			</div>

			<div>
				<label for="body" class="block">Body</label>
				<textarea name="body" id="body" cols="30" rows="10" class="block w-full p-3"></textarea>
			</div>

			<div>
				<button type="submit">Save</button>
			</div>

		</form>
	</div>
	<div>
		<div class="input-group">
		   	<span class="input-group-btn">
		    	 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
		       		<i class="fa fa-picture-o"></i> Choose
		     	</a>
		   </span>
		   <input id="thumbnail" class="form-control" type="text" name="filepath">
		</div>
		<img id="holder" style="margin-top:15px;max-height:100px;">
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
	<script>
		$('#lfm').filemanager('image');
	</script>

</div>
@endsection
