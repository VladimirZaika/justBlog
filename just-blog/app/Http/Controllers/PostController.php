<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;

class PostController extends Controller {
    public function index(): View {
        $posts = Post::query()
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->paginate(6);
        
        return view('posts.index', compact('posts'));
    }

    public function show($post): View {
        return view('posts.show', compact('posts'));
    }
}
