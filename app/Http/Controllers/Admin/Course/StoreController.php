<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Requests\Admin\Course\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.course.index');
    }
}
