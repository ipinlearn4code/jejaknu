<?php

namespace App\Controllers;
use App\Controllers\PostController;
use PhpParser\Node\Expr\Cast\String_;

class Home extends BaseController
{
    // public function index(): string
    // {
    //     $postController = new PostController();
    //     $data ['articles'] = $postController->getLatestArticles();
    //     $data2 ['news'] = $postController->getLatestNews();
    //     return view('index', $data, $data2);
    // }
    public function index():String 
    {
        return view('form');
    }
}
