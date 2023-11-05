<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Models\Gallery;

class EditController extends BaseController
{
    public function __invoke(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }
}
