<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Models\Gallery;

class ShowController extends BaseController
{
    public function __invoke(Gallery $gallery)
    {
        return view('admin.gallery.show', compact('gallery'));
    }
}
