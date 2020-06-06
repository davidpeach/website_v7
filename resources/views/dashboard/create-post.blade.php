@extends('layouts.dashboard')

@section('content')

	<h1>Create a post</h1>

	<form method="POST" action="{{ $action }}" class="bg-teal-500 p-10 ">
		{!! csrf_field() !!}
		{!! method_field($method) !!}
		<div>
			<label for="title" class="block">Title</label>
			<input type="text" name="title" id="title" class="block w-full p-3" value="{{ $post->title }}">
		</div>

		<div>
			<label for="body" class="block">Body</label>
			<textarea name="body" id="body" cols="30" rows="10" class="block w-full p-3 hidden">{{ $post->getRawContent() }}</textarea>
		</div>

		<div>
			<button type="submit">Save</button>
		</div>

	</form>
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">
@endsection

@section('scripts')
<script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>
<script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
<script src="{{ asset('vendor/laraberg/js/laraberg.js') }}"></script>
<script>
	Laraberg.init('body');
</script>
@endsection