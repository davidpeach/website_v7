@extends('layouts.base')

@section('body')
	<header class="bg-gray-600">
		<h1><a href="{{ route('dashboard') }}">Dashboard</a></h1>
	</header>
	<nav class="bg-black text-white flex justify-center mb-10">
		<a href="{{ route('post.create') }}">Add Post</a>
	</nav>
	<main class="w-2/3 m-auto">
    @yield('content')
    </main>
@endsection
