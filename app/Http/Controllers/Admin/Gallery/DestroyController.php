<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Models\Gallery;

class DestroyController extends BaseController
{
    public function __invoke(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index');
    }
}
