<?php

namespace App\Http\Controllers\Admin\Review;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('admin.reviews.create');
    }
}
