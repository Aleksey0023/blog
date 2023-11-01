<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
        $user = auth()->user();
        $user->likedPosts()->toggle($post->id);
        $liked = $user->likedPosts->contains($post->id);
        $likeCount = $post->liked_users_count;

        return response()->json([
            'liked' => $liked,
            'likeCount' => $likeCount,
        ]);
    }
}
