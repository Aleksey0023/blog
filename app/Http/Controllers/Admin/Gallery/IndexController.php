<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Models\Gallery;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $gallery = Gallery::all();
        return view('admin.gallery.index', compact('gallery'));
    }
}
