@extends('layouts.app')

@section('page_heading')
{{ config('pages.home.heading') }}
@endsection

@section('page_tagline')
{{ config('pages.home.tagline') }}
@endsection

@section('content')
<div class="w-2/5 m-auto">

    <section class="mt-6 leading-relaxed">
        <h2 class="text-4xl mb-3">Welcome</h2>
        <div class="text-xl">
            <p>Welcome to my website. I am currently transitioning to a new website backend (from WordPress to Laravel, for those interested). I will be moving all of my old posts over a bit at a time, but until then the old links should continue to work.</p>
        </div>
    </section>

    <section class="mt-6 leading-relaxed">
        <h2 class="text-4xl mb-3">About Me</h2>
        <div class="text-xl">
            <p>I am a web developer with around 8 years' experience - much of that working with <abbr title="PHP: Hypertext Preprocessor">PHP</abbr>.</p>
            <p class="mt-2">I also run the <a href="https://junjiitomanga.com">Junji Ito Manga Site</a>, which is a personal blog celebrating and reviewing the work of Japanese Horror Manga artist Junji Ito.</p>
            <p class="mt-2"></p>
        </div>
    </section>

    <aside class="mt-6">
        <h2 class="text-4xl mb-3">Connect elsewhere too</h2>
        <ul class="flex">
            <li class="ml-2 text-lg"><a href="https://twitter.com/realdavidpeach" class="text-blue-600">Twitter</a></li>
            <li class="ml-2 text-lg"><a href="https://www.linkedin.com/in/davepeach/" class="text-blue-600">LinkedIn</a></li>
        </ul>
    </aside>
</div>
@endsection
