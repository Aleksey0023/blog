<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(6);

        if ($posts->count() > 4) {
            $randomPosts = Post::get()->random(4);
        } else if (!Post::all()->isEmpty()) {
            $randomPosts = Post::get()->random($posts->count());
        } else {
            $randomPosts = null;
        }

        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        $categories = Category::all();
        return view('post.index', compact('posts', 'randomPosts', 'likedPosts', 'categories'));
    }
}
