<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Requests\Admin\Review\UpdateRequest;
use App\Models\Review;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Review $review)
    {
        $data = $request->validated();
        $review = $this->service->update($data, $review);
        return view('admin.reviews.show', compact('review'));
    }
}
