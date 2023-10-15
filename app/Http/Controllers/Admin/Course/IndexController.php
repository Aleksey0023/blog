<?php

namespace App\Http\Controllers\Admin\Course;

use App\Models\Course;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }
}
