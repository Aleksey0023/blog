<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Requests\Admin\Course\UpdateRequest;
use App\Models\Course;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Course $course)
    {
        $data = $request->validated();
        $course = $this->service->update($data, $course);
        return view('admin.courses.show', compact('course'));
    }
}
