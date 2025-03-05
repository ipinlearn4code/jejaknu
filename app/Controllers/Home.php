<?php

namespace App\Controllers;
use App\Controllers\PostController;
use PhpParser\Node\Expr\Cast\String_;
use App\Models\CadreProfileModel;

class Home extends BaseController
{
    protected $cadreProfileModel;
    public function index(): string
    {
        $this->cadreProfileModel = new CadreProfileModel();
        $postController = new PostController();
        $data = [
            'cadreCount' => $this->cadreProfileModel->countAll(),
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
