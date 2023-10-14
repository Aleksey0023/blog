<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;

class IndexController extends Controller
{
    public function __invoke()
    {
        $courses = Course::orderBy('created_at', 'DESC')->paginate(6);
        return view('course.index', compact('courses'));
    }
}
