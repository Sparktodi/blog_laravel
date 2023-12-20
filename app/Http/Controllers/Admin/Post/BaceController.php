<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Service\PostService;

class BaceController extends Controller
{
    public $service;

    public function __construct( PostService $service)
    {
        $this->service = $service;
    }
}
