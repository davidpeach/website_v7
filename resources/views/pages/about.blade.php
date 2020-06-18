@extends('layouts.app')

@section('page_heading')
{{ config('pages.about.heading') }}
@endsection

@section('page_tagline')
{{ config('pages.about.tagline') }}
@endsection

@section('content')
<div class="w-2/5 m-auto">
    <section class="mt-6 leading-relaxed">
        <h2 class="text-xl">About Me</h2>
        <div>
        <p>I am a web developer with around 8 years' experience - much of that working with <abbr title="PHP: Hypertext Preprocessor">PHP</abbr>.</p>
        <p class="mt-2">I also run the <a href="https://junjiitomanga.com">Junji Ito Manga Site</a>, which is a personal blog celebrating and reviewing the work of Japanese Horror Manga artist Junji Ito.</p>
        <p class="mt-2">I am the creator and admin for the Horror Manga Collective - a Facebook group of over 60,000 horror manga fans across the world. I am in the process of building a dedicated website for the group.</p>
        </div>
    </section>

    <section class="mt-6 leading-relaxed">
        <h2 class="text-xl">About This Page</h2>
        <p>This is a temporary home page after I move my original site's address to `blog.davidpeach.co.uk`. The reason for this is to keep the wordpress blog in it's own separate place. Giving me freedom to explore diffrent languages and/or frameworks for other areas of my site. It's more of an opportunity for me to learn new things than a stylistic decision.</p>
    </section>

    <aside class="mt-6">
        <h2 class="text-xl">Connect elsewhere too</h2>
        <ul class="flex">
            <li class="text-lg"><a href="https://blog.davidpeach.co.uk" class="text-blue-600">Blog</a></li>
            <li class="ml-2 text-lg"><a href="https://twitter.com/realdavidpeach" class="text-blue-600">Twitter</a></li>
            <li class="ml-2 text-lg"><a href="https://www.linkedin.com/in/davepeach/" class="text-blue-600">LinkedIn</a></li>
        </ul>
    </aside>
</div>
@endsection
