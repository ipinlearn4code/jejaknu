<?php

namespace App\Controllers;
use App\Controllers\PostController;
use PhpParser\Node\Expr\Cast\String_;

class Home extends BaseController
{
    public function index(): string
    {
        $postController = new PostController();
        $data = [
            'articles' => $postController->getLatestArticles(),
            'news' => $postController->getLatestNews(),
        ];
        return view('index', $data);
    }
    // public function index():String 
    // {
    //     dd(session()->get());
    // }
}
