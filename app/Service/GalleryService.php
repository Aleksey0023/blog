<?php

namespace App\Service;

use App\Models\Gallery;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GalleryService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            Gallery::firstOrCreate($data);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $gallery)
    {
        try {
            DB::beginTransaction();

            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $gallery->update($data);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $gallery;
    }
}
