<?php
namespace App\Controllers;

class FrontController extends BaseController
{
//menangani tampilan setiap halaman tampilan view
   public function dashboard(): string
    {
        $postController = new PostController();
        $data= $postController->getLatestPosts();
        return view('index', $data);
    }

    public function daftarkader(): string
    {
        return view('front/kader/create');
    }
    public function eventRutin(): string
    {
        return view('front/event/rutin'); // View untuk event rutin
    }

    public function eventSpesial(): string
    {
        return view('front/event/spesial'); // View untuk event spesial
    }

    public function news(): string
    {
        return view('front/jejakkabar/news'); // View untuk event spesial
    }

    public function artikel(): string
    {
        return view('front/jejakkabar/artikel'); // View untuk event spesial
    }

}


