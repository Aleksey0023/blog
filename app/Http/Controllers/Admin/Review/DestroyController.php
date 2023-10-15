<?php

namespace App\Http\Controllers\Admin\Review;

use App\Models\Review;

class DestroyController extends BaseController
{
    public function __invoke(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.review.index');
    }
}
