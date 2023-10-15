<?php

namespace App\Http\Controllers\Admin\Review;

use App\Models\Review;

class EditController extends BaseController
{
    public function __invoke(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }
}
