<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(): View {
        $posts = Post::latest()->paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse {
        $data = $request->validate([
            'title'=> 'required',
            'slug'=> 'nullable',
            'exerpt' => 'required|min:10',
            'body' => 'required|min:10',
            'is_published' => 'nullable',
            'published_at'=> 'nullable',
            'user_id'=> 'nullable',
        ]);

        $slugbase = Str::slug($data['title']);
        $slug = $slugbase . '-' . rand(1, 999999);

        $data['slug'] = $slug;
        $data['published_at'] = $data['is_published'] ? now() : null;

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse {
        $data = $request->validate([
            'title'=> 'required',
            'exerpt' => 'required|min:10',
            'body' => 'required|min:10',
            'is_published' => 'nullable',
            'published_at'=> 'nullable',
            'user_id'=> 'nullable',
        ]);

        $data['published_at'] = $data['is_published'] ? now() : null;

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted');
    }
}
