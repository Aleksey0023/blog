<?php

namespace App\Http\Controllers\Admin\Course;

use App\Models\Course;

class ShowController extends BaseController
{
    public function __invoke(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }
}
