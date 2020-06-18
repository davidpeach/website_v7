@extends('layouts.dashboard')

@section('heading')
    <h1>All Posts</h1>
@endsection

@section('content')
    <div>
        {{ $posts->links() }}
    </div>
    <ul>
    @forelse($posts as $post)
        <li class="px-2 py-3 mt-2 bg-gray-100 border    ">
            <div class="flex justify-between">
                <a href="#">{{ $post->title }}</a>
                <span>
                    <span>Another field</span>
                </span>
            </div>
            <div class="text-xs mt-2">
                <p>Published: 24th December 2020</p>
                <p>Tags: horror, film, music, lolz</p>
            </div>
        </li>
    @empty
        <li>No posts to show</li>
    @endforelse
    </ul>
    <div class="mt-2">
        {{ $posts->links() }}
    </div>
@endsection
