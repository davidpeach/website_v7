@extends('layouts.app')

@section('page_heading')
{{ config('pages.blog.heading') }}
@endsection

@section('page_tagline')
{{ config('pages.blog.tagline') }}
@endsection

@section('content')
	<section class="w-2/5 m-auto">
		@foreach($posts as $post)
		<article class="mt-15 pb-15">
			<h2 class="text-3xl">{{ $post->title }}</h2>
			<div class="mt-3 text-xl leading-relaxed font-reading">{{ $post->body }}</div>
		</article>
		<hr class="w-1/2 m-auto">
		@endforeach
	</section>
@endsection