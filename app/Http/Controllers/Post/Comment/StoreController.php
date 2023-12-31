<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(Post $post, StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;
        $comment = Comment::create($data);

        return response()->json([
            'success' => true,
            'username' => $comment->user->name,
            'comment' => $comment->message,
            'timeAgo' => $comment->dateAsCarbon->diffForHumans(),
        ]);
    }
}
