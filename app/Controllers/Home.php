<?php

namespace App\Controllers;
use App\Controllers\PostController;

class Home extends BaseController
{
    public function index(): string
    {
        $postController = new PostController();
        $data= $postController->getLatestPosts();
        return view('index', $data);
    }
}
