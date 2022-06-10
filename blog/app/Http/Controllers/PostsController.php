<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = new Post([
            'title' => $request->input('title'),
            'slug'  => Str::slug($request->input('title')),
            'content' => $request->input('content'),
            'image' => $request->input('image'),
            'likes' => rand(50, 1500),
            'is_published' => 1
        ]);

        $post->save();

        return redirect()->back();
    }

    public function index()
    {
        $posts = Post::paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back();
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $post->title = $request->input('title');
        $post->slug = Str::slug($request->input('title'));
        $post->content = $request->input('content');
        $post->image = $request->input('image');

        $post->save();

        return redirect()->back();
    }
}
