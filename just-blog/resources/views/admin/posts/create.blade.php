@extends('admin.layouts.app')

@section('post-content')
    <div class="w-full max-w-4xl mx-auto py-10 px-4 text-gray-100">
        <div class="mb-10">
            <h1 class="text-4xl font-bold tracking-tight mb-2">
                Create New Post
            </h1>
            <p class="text-gray-400">
                Fill in the fields below to publish a new blog post.
            </p>
        </div>

        @if ($errors->any())
            <div class="mb-6 rounded-2xl border border-red-500/30 bg-red-500/10 p-5">
                <ul class="space-y-2 text-red-400 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.create') }}" method="POST"
            class="bg-gray-900 border border-gray-800 rounded-2xl p-8 shadow-xl space-y-8 px-4 py-4">
            @csrf

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-300">
                    Title
                </label>
                <input type="text"
                    name="title"
                    value="{{ old('title') }}"
                    class="w-full rounded-xl bg-gray-950 border border-gray-700 px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Enter post title">
                @error('title') <p class="text-red-400 text-sm text-1">{{ 'message' }}</p> @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-300">
                    Excerpt
                </label>
                <textarea name="exerpt"
                        rows="4"
                        class="w-full rounded-xl bg-gray-950 border border-gray-700 px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Short description of the post">{{ old('exerpt') }}</textarea>
                @error('exerpt') <p class="text-red-400 text-sm text-1">{{ 'message' }}</p> @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-300">
                    Text
                </label>
                <textarea name="body"
                        rows="10"
                        class="w-full rounded-xl bg-gray-950 border border-gray-700 px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Write full post content here...">{{ old('body') }}</textarea>
                @error('body') <p class="text-red-400 text-sm text-1">{{ 'message' }}</p> @enderror
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">
                        Status
                    </label>

                    <label class="inline-flex items-center gap-3 cursor-pointer">
                        <input type="checkbox"
                            name="is_published"
                            value="1"
                            {{ old('is_published') ? 'checked' : '' }}
                            class="w-5 h-5 rounded bg-gray-800 border-gray-700 text-indigo-600 focus:ring-indigo-500">
                        <span class="text-gray-300">Publish now</span>
                    </label>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 pt-4">

                <button type="submit"
                        class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 transition font-medium shadow-lg">
                    Create Post
                </button>

                <a href="{{ route('admin.posts.index') }}"
                class="px-6 py-3 rounded-xl bg-gray-800 hover:bg-gray-700 transition text-center">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
