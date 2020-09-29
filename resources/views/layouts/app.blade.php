@extends('layouts.base')

@push('styles')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endpush

@section('body')

<header class="page-header" style="background-image: url(https://cdn.davidpeach.co.uk/2017/10/elle-fanning-neon-demon-1.jpg)">
	<div class="page-header-inner-wrap">
		<div class="page-header__nav-banner">
			<div class="page-header__nav-banner__title-wrap">
				<a href="/" class="site-title">{{ config('app.name') }}</a>
				<p class="page-header__site-tagline">{{ config('app.tagline') }}</p>
			</div>
			<nav class="page-header__nav-banner__main-nav-wrap main-nav">
				<a href="/">Home</a>
				@include('components.login-logout')
			</nav>
		</div>
		<div class="page-header__title-wrap">
			<h1 class="page-header__page-title">
				@yield('page_heading')
			</h1>
			<p class="page-header__page-tagline">
				@yield('page_tagline')
			</p>
		</div>
	</div>
</header>

    @yield('content')
@endsection
