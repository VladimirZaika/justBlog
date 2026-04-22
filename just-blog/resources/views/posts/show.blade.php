@extends('layouts.main')

@section('content')
        <div>
            <h2>{{ $post->title }}</h2>

            <p>{{ $post->published_at?->format('d.m.y') }}</p>
        </div>

        <div>{!! nl2br(e($post->body)) !!}</div>
@endsection
