<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Review;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [
            'usersCount' => User::count(),
            'postsCount' => Post::count(),
            'categoriesCount' => Category::count(),
            'tagsCount' => Tag::count(),
            'coursesCount' => Course::count(),
            'reviewsCount' => Review::count(),
            'galleryCount' => Gallery::count()
        ];

        return view('admin.main.index', compact('data'));
    }
}
