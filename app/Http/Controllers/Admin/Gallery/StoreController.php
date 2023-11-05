<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Requests\Admin\Gallery\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.gallery.index');
    }
}
