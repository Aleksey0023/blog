<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Review;

class IndexController extends Controller
{
    public function __invoke()
    {
        $page = request('page', 1);

        $reviews = Review::orderBy('created_at', 'DESC')->paginate(6, ['*'], 'page', $page);

        if ($reviews->isEmpty()) {
            abort(404);
        }

        return view('review.index', compact('reviews'));
    }
}
