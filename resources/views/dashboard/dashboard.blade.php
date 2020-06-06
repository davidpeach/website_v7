@extends('layouts.dashboard')

@section('content')
	<h1>Welcome to the dashboard</h1>
    <ul>
    @foreach(\App\Post::latest()->get() as $post)
    <li><a href="{{ route('post.edit', $post) }}">{{ $post->title }} POST</a></li>
    @endforeach
    </ul>
@endsection