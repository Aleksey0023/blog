<?php

namespace App\Http\Controllers\Admin\Course;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('admin.courses.create');
    }
}
