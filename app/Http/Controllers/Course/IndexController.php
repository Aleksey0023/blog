<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;

class IndexController extends Controller
{
    public function __invoke()
    {
        $page = request('page', 1);

        $courses = Course::orderBy('created_at', 'DESC')->paginate(6, ['*'], 'page', $page);

        if ($courses->isEmpty()) {
            abort(404);
        }

        return view('course.index', compact('courses'));
    }
}
