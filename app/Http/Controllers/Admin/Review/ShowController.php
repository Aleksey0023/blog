<?php

namespace App\Http\Controllers\Admin\Review;

use App\Models\Review;

class ShowController extends BaseController
{
    public function __invoke(Review $review)
    {
        return view('admin.reviews.show', compact('review'));
    }
}
