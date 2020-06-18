@extends('layouts.app')

@section('page_heading')
{{ config('pages.stream.heading') }}
@endsection

@section('page_tagline')
{{ config('pages.stream.tagline') }}
@endsection

@section('content')
    <section class="w-2/5 m-auto mt-10">
        @foreach($stream as $activity)
        <article class="mt-3 pb-3">
            <h2 class="text-md">Published {{ $activity->subject->title }} <span class="text-sm font-bold text-indigo-500">{{ $activity->subject->created_at->diffForHumans() }}</span></h2>
        </article>
        <hr class="w-1/2">
        @endforeach
        <div class="mt-6 bg-gray-300 p-2 rounded">
            {{ $stream->links() }}
        </div>
    </section>
@endsection
