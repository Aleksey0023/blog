<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Requests\Admin\Review\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.review.index');
    }
}
