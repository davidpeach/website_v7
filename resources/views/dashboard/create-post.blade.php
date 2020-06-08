@extends('layouts.dashboard')

@section('content')

	<h1 class="text-3xl text-center">Create a post</h1>

	<form method="POST" action="{{ $action }}">
		{!! csrf_field() !!}
		{!! method_field($method) !!}
		<div class="w-1/3 m-auto mt-6">
			<label for="title" class="block">Title</label>
			<input type="text" name="title" id="title" class="block w-full p-3 border" value="{{ $post->title }}">
		</div>

		<div class="mt-3">
			<label for="body" class="block hidden">Body</label>
			<textarea name="body" id="body" cols="30" rows="10" class="block w-full p-3 hidden">{{ $post->getRawContent() }}</textarea>
		</div>

		<div>
			<button type="submit" class="m-auto block mt-3 p-6 bg-green-400">Save</button>
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
	Laraberg.init('body', { laravelFilemanager: true });
</script>
@endsection