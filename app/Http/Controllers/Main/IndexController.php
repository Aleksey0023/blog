<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return redirect()->route('post.index'); // Главная страница в разработке, поэтому пока идёт редирект на страницу блога
    }
}
