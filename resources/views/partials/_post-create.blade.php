@if(auth()->check())
<section class="w-2/5 m-auto mt-6" x-data="{ open: false }">
	<button
		class="bg-gray-400 hover:bg-gray-500 text-white px-3 py-2 mb-3"
		x-on:click="open = !open"
		x-text="open ? 'Close' : 'Open post form'"
	>Add a post</button>
	<form method="POST" action="{{ route('dashboard.post.store') }}" class="bg-gray-30  borde border-gray-50" x-show="open">
		{!! csrf_field() !!}

		<div>
			<label for="title" class="block">Title</label>
			<input type="text" name="title" id="title" class="block w-full p-3 border border-gray-500">
		</div>

		<div class="mt-6">
			<label for="body" class="block">Body</label>
			<textarea name="body" id="body" cols="30" rows="10" class="block w-full p-3 border border-gray-500"></textarea>
		</div>

		<div class="mt-6">
			<button type="submit" class="w-full bg-teal-500 hover:bg-teal-600 text-white px-3 py-2">Save</button>
		</div>

	</form>
</section>
@endif
