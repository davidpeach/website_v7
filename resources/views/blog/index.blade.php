@extends('layouts.app')

@section('page_heading')
{{ config('pages.blog.heading') }}
@endsection

@section('page_tagline')
{{ config('pages.blog.tagline') }}
@endsection

@section('content')
	@include('partials._post-create')
	<section class="w-2/5 m-auto">
		@foreach($posts as $post)
		<article class="mt-15 pb-15">
			<h2 class="text-3xl">{{ $post->title }}</h2>
			<div class="mt-3 text-xl leading-relaxed font-reading">{!! $post->body_html !!}</div>
		</article>
		<hr class="w-1/2 m-auto">
		@endforeach
		<div class="mt-6 bg-gray-300 p-2 rounded">
			{{ $posts->links() }}
		</div>
	</section>
@endsection
