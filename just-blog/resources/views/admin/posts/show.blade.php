@extends('admin.layouts.app')

@section('post-content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.posts.index') }}">Блог</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $post->title }}
                        </li>
                    </ol>
                </nav>

                <article class="card shadow-sm border-0">

                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}"
                            class="card-img-top"
                            alt="{{ $post->title }}"
                            style="max-height:450px; object-fit:cover;">
                    @endif

                    <div class="card-body p-5">

                        @if($post->category)
                            <span class="badge bg-primary mb-3">
                                {{ $post->category->title }}
                            </span>
                        @endif

                        <h1 class="mb-3">{{ $post->title }}</h1>

                        <div class="text-muted small mb-4">
                            <span>Автор: {{ $post->user->name ?? 'Admin' }}</span>
                            |
                            <span>{{ $post->created_at->format('d.m.Y H:i') }}</span>
                        </div>

                        @if($post->excerpt)
                            <div class="alert alert-light border-start border-4 border-primary mb-4">
                                {{ $post->excerpt }}
                            </div>
                        @endif

                        <div class="post-content fs-5 lh-lg">
                            {!! nl2br(e($post->body)) !!}
                        </div>
                    </div>

                    <div class="card-footer bg-white border-0 px-5 pb-4">
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">
                            ← Назад к постам
                        </a>

                        @auth
                            @if(auth()->id() === $post->user_id || auth()->user()->is_admin)
                                <a href="{{ route('admin.posts.edit', $post) }}"
                                class="btn btn-warning ms-2">
                                    Редактировать
                                </a>
                            @endif
                        @endauth
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection