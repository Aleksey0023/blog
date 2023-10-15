<?php

namespace App\Http\Controllers\Admin\Course;

use App\Models\Course;

class EditController extends BaseController
{
    public function __invoke(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }
}
