<?php

namespace App\Http\Controllers\Admin\Review;

use App\Models\Review;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $reviews = Review::all();
        return view('admin.reviews.index', compact('reviews'));
    }
}
