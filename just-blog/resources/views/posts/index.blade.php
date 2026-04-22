@extends('layouts.main')

@section('content')
    @foreach ($posts as $post)
        <div>
            <h2>
                <a href="{{ route('posts.show', $post->slug) }}" aria-label="{{ $post->title }}" target="_self">{{ $post->title }}</a>
            </h2>
        </div>

        <p>{{ $post->published_at?->format('d.m.y') }}</p>

        <p>{{ Str::limit($post->exerpt, 150) }}</p>

        <a href="{{ route('posts.show', $post->slug) }}" aria-label="Read more" target="_self">Read more</a>
    @endforeach

    <div>{{ $posts->Links() }}</div>
@endsection
