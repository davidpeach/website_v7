@extends('layouts.base')

@section('body')

<header
class="bg-fixed bg-cover bg-center bg-no-repeat"
style="background-image: url(https://davidpeach.co.uk/app/uploads/2017/10/elle-fanning-neon-demon-1.jpg)">
	<div
	class="h-screen-70 flex flex-col justify-between text-white bg-black bg-opacity-50"

	>
		<div class="flex items-baseline justify-between py-6 px-20">
			<div class="flex items-baseline">
				<a href="#" class="text-2xl font-bold">{{ config('app.name') }}</a>
				<p class="text-xl ml-3">{{ config('app.tagline') }}</p>
			</div>
			<nav class="flex flex-grow justify-end text-lg">
				<a href="/">Home</a>
				<a href="{{ route('blog') }}" class="ml-6">Blog</a>
				<a href="{{ route('stream') }}" class="ml-6">Stream</a>
				@include('components.login-logout')
			</nav>
		</div>
		<div class="text-center mb-10">
			<h1 class="text-6xl font-page-heading font-bold">
				@yield('page_heading')
			</h1>
			<p class="m-auto mt-6 text-4xl max-w-6xl font-page-heading">
				@yield('page_tagline')
			</p>
		</div>
	</div>
</header>

    @yield('content')
@endsection
