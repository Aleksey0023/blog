<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = $category->posts()->orderBy('created_at', 'DESC')->paginate(6);
        $categoryTitle = $category->title;
        return view('category.post.index', compact('posts', 'categoryTitle'));
    }
}
