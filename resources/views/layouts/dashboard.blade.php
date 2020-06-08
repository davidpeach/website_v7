@extends('layouts.base')

@section('body')
	<header class="bg-gray-600">
		<h1><a href="{{ route('dashboard') }}">Dashboard</a></h1>
	</header>
	<main class="pt-6">
    @yield('content')
    </main>
@endsection
