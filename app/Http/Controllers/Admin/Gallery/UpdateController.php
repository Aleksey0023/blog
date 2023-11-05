<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Requests\Admin\Gallery\UpdateRequest;
use App\Models\Gallery;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Gallery $gallery)
    {
        $data = $request->validated();
        $gallery = $this->service->update($data, $gallery);
        return view('admin.gallery.show', compact('gallery'));
    }
}
