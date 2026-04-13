<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // index/show 以外は要ログイン
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('user');
        return view('posts.show', compact('post'));

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required','string','max:100'],
            'body'  => ['required','string'],
        ]);

        $post = Post::create([
            'title'   => $validated['title'],
            'body'    => $validated['body'],
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('posts.show', $post)->with('status', '投稿を作成しました');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => ['required','string','max:100'],
            'body'  => ['required','string'],
        ]);

        $post->update($validated);

        return redirect()->route('posts.show', $post)->with('status', '投稿を更新しました');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index')->with('status', '投稿を削除しました');
    }
}
