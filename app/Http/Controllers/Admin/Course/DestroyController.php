<?php

namespace App\Http\Controllers\Admin\Course;

use App\Models\Course;

class DestroyController extends BaseController
{
    public function __invoke(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.course.index');
    }
}
