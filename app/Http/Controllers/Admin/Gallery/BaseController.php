<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Service\GalleryService;

class BaseController extends Controller
{
    public $service;

    /**
     * @param $service
     */
    public function __construct(GalleryService $service)
    {
        $this->service = $service;
    }
}
