@extends('layouts.dashboard')

@section('content')

	<h1>Create a post</h1>

	<form method="POST" action="{{ route('post.store') }}" class="bg-teal-500 p-10 w-1/2">
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
@endsection