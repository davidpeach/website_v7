@extends('layouts.app')

@section('page_heading')
{{ config('pages.stream.heading') }}
@endsection

@section('page_tagline')
{{ config('pages.stream.tagline') }}
@endsection

@section('content')
    <section class="w-2/5 m-auto">
        @foreach($stream as $activity)
        <article class="mt-15 pb-15">
            <h2 class="text-3xl">Published {{ $activity->subject->title }} {{ $activity->subject->published_at->diffForHumans() }}</h2>
        </article>
        <hr class="w-1/2 m-auto">
        @endforeach
    </section>
@endsection