@extends('admin.layouts.app')

@section('post-content')
<div class="min-h-screen bg-gray-950 text-gray-100 py-10 w-full">
    <div class="max-w-6xl mx-auto px-4 w-full">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-10">
            <div>
                <h1 class="text-4xl font-bold tracking-tight">Welcome to Blog</h1>

                <p class="text-gray-400 mt-2">Latest posts, news and updates.</p>
            </div>

            @auth
                <a href="{{ route('posts.create') }}"
                   class="inline-flex items-center px-5 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 transition font-medium shadow-lg">
                    + Create Post
                </a>
            @endauth
        </div>

        @if($posts->count())
            <div class="grid gap-6 md:grid-cols-2">

                @foreach($posts as $post)
                    <article class="bg-gray-900 border border-gray-800 rounded-2xl p-6 shadow-xl hover:border-indigo-500 transition duration-300">
                        <h2 class="text-2xl font-semibold mb-3 leading-tight">
                            <a href="{{ route('admin.posts.show', $post->id) }}"
                               class="hover:text-indigo-400 transition">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <div class="text-sm text-gray-400 mb-4">
                            Post created {{ $post->published_at?->diffForHumans() }}
                        </div>

                        <p class="text-gray-300 leading-relaxed mb-6">
                            {{ $post->exerpt }}
                        </p>

                        <div class="flex items-center justify-between gap-3 mt-auto">

                            <a href="{{ route('admin.posts.show', $post->id) }}"
                               class="text-sm text-indigo-400 hover:text-indigo-300 transition">
                                Read more →
                            </a>

                            @auth
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.posts.edit', $post->id) }}"
                                       class="px-4 py-2 rounded-lg bg-yellow-500/20 text-yellow-400 hover:bg-yellow-500/30 transition text-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.posts.delete', $post->id) }}"
                                          method="DELETE"
                                          class="delete-post-form">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-4 py-2 rounded-lg bg-red-500/20 text-red-400 hover:bg-red-500/30 transition text-sm">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $posts->links() }}
            </div>

        @else
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-10 text-center">
                <h3 class="text-2xl font-semibold mb-2">No posts yet</h3>
                <p class="text-gray-400">Create the first post to get started.</p>
            </div>
        @endif

    </div>
</div>
@endsection
