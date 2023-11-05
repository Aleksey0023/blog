<?php

namespace App\Http\Controllers\Admin\Gallery;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('admin.gallery.create');
    }
}
