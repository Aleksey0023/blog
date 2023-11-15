<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class IndexController extends Controller
{
    public function __invoke()
    {
        $page = request('page', 1);

        $gallery = Gallery::orderBy('created_at', 'DESC')->paginate(6, ['*'], 'page', $page);

        if ($gallery->isEmpty()) {
            abort(404);
        }

        return view('gallery.index', compact('gallery'));
    }
}
