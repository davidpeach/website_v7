@extends('layouts.app')

@section('page_heading')
{{ config('pages.home.heading') }}
@endsection

@section('page_tagline')
{{ config('pages.home.tagline') }}
@endsection

@section('content')
    <h2>Home Page</h2>
@endsection
