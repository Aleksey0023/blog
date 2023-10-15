<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;

class ShowController extends Controller
{
    public function __invoke(Course $course)
    {
        return view('course.show', compact('course'));
    }
}
