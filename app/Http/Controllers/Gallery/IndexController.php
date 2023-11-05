<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class IndexController extends Controller
{
    public function __invoke()
    {
        $gallery = Gallery::orderBy('created_at', 'DESC')->paginate(6);
        return view('gallery.index', compact('gallery'));
    }
}
