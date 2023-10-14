<?php

namespace App\Service;

use App\Models\Course;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CourseService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            Course::firstOrCreate($data);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $course)
    {
        try {
            DB::beginTransaction();

            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $course->update($data);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $course;
    }
}
