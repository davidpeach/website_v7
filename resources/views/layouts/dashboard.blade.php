@extends('layouts.base')

@push('styles')
<link rel="stylesheet" href="{{ mix('css/admin.css') }}">
@endpush

@section('body')
	<header class="bg-gray-300 py-3 text-center">
		<h1><a href="{{ route('dashboard') }}">Dashboard</a></h1>
	</header>
    <div class="flex">
        <aside class="w-40 bg-gray-300 mr-6">
        	<nav class="text-white">
        		<a href="{{ route('dashboard.post.index') }}" class="block p-2 bg-indigo-500">All Posts</a>
                <a href="{{ route('dashboard.post.create') }}" class="block p-2 mt-1 bg-indigo-500">Create Post</a>
                <a href="#" class="block p-2 mt-1 bg-indigo-500">Link Three</a>
                <a href="#" class="block p-2 mt-1 bg-indigo-500">Link Four</a>
                <a href="#" class="block p-2 mt-1 bg-indigo-500">Link Five</a>
        	</nav>
        </aside>
    	<main class="flex-1 mr-6">
            <div class="py-2 text-2xl font-bold">
                @yield('heading')
            </div>
            @yield('content')
        </main>
    </div>
@endsection
