<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getPosts()
    {
        $blog = [
            'posts' => \Canvas\Post::published()->orderByDesc('published_at')->simplePaginate(10),
        ];
        $posts = Post::all();

        return view('welcome', compact('blog'));
    }

    public function show(string $slug)
    {
        $posts = \Canvas\Post::with('tags', 'topic')->published()->get();
        $post = $posts->firstWhere('slug', $slug);

        if (optional($post)->published) {
            $blog = [
                'author' => $post->user,
                'post'   => $post,
                'meta'   => $post->meta,
            ];

            // IMPORTANT: This event must be called for tracking visitor/view traffic
            event(new \Canvas\Events\PostViewed($post));

            return view('blog.show', compact('blog'));
        } else {
            abort(404);
        }
    }

    public function getPostsByTag(string $slug)
    {
        if (\Canvas\Tag::where('slug', $slug)->first()) {
            $data = [
                'posts' => \Canvas\Post::whereHas('tags', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })->published()->orderByDesc('published_at')->simplePaginate(10),
            ];

            return view('welcome', compact('data'));
        } else {
            abort(404);
        }
    }

    public function getPostsByTopic(string $slug)
    {
        if (\Canvas\Topic::where('slug', $slug)->first()) {
            $data = [
                'posts' => \Canvas\Post::whereHas('topic', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })->published()->orderByDesc('published_at')->simplePaginate(10),
            ];

            return view('welcome', compact('data'));
        } else {
            abort(404);
        }
    }
}