<?php

namespace App\Service;

use App\Models\Review;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReviewService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            Review::firstOrCreate($data);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $review)
    {
        try {
            DB::beginTransaction();

            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $review->update($data);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $review;
    }
}
