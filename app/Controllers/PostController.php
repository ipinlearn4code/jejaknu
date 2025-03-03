<?php

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\Controller;

class PostController extends Controller
{
    protected $postModel;
    protected $userId;

    public function __construct()
    {
        $this->userId = session()->get('user_id');
        $this->username = session()->get('username');
        $this->postModel = new PostModel();
    }

    public function index()
    {
        $data = [
            'posts' => $this->postModel->findAll(),
            'title' => 'Posts'
        ];
        return view('posts/index', $data);
    }

    public function news()
    {
        $data = [
            'posts' => $this->postModel->getLatestPublishedByCategory(null, 'news'),
            'title' => 'Berita'
        ];
        return view('posts/index', $data);
    }

    public function article()
    {
        $data = [
            'posts' => $this->postModel->getLatestPublishedByCategory(null, 'article'),
            'title' => 'Artikel'
        ];
        return view('posts/index', $data);
    }

    public function new()
    {
        return view('posts/create');
    }

    public function show($id = null)
    {
        $data['post'] = $this->postModel->find($id);
        if ($id === null || !$data) {
            return ['error' => 'Post not found'];
        }
        return view('posts/show', $data);
    }

    public function getLatestPosts()
    {
        $data = $this->postModel->getLatestPublishedPosts(3);
        return $data;
    }

    public function getLatestNews()
    {
        $data = $this->postModel->getLatestPublishedByCategory(3, 'news');
        return $data;
    }
    public function getLatestArticles()
    {
        $data = $this->postModel->getLatestPublishedByCategory(3, 'article');
        return $data;
    }

    public function uploadImage()
    {
        $file = $this->request->getFile('upload'); // 'upload' sesuai dengan nama field di request

        if (!$file->isValid() || $file->hasMoved()) {
            return $this->response->setJSON(['error' => 'Invalid file upload'])->setStatusCode(400);
        }

        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/imgpost', $newName);

        return $this->response->setJSON([
            'url' => base_url('uploads/imgpost/' . $newName)
        ]);
    }


    // public function store()
    // {
    //     $rules = [
    //         'title' => 'required|min_length[3]',
    //         'content' => 'required',
    //         'category' => 'required',
    //         // 'featured_image' => 'uploaded[featured_image]|max_size[featured_image,1028]|is_image[featured_image]'
    //     ];

    //     if (!$this->validate($rules)) {
    //         return ['errors' => $this->validator->getErrors()];
    //     }

    //     // Handle file upload for featured image
    //     $file = $this->request->getFile('featured_image');
    //     if ($file && $file->isValid() && !$file->hasMoved()) {
    //         // Build a unique filename using random name, user id and title
    //         $newName = $file->getRandomName() . '_' . $this->userId . '_' . url_title($this->request->getPost('title'));
    //         $file->move(WRITEPATH . '../public/uploads', $newName);
    //         $imagePath = '/uploads/' . $newName;
    //     } else {
    //         $imagePath = null;
    //     }

    //     $data = [
    //         'title' => $this->request->getPost('title'),
    //         'content' => $this->request->getPost('content'),
    //         'user_id' => $this->userId,
    //         'category' => $this->request->getPost('category'),
    //         'featured_image' => $imagePath,
    //         'status' => $this->request->getPost('status') ?? 'draft'
    //     ];

    //     $this->postModel->save($data);
    //     $data['id'] = $this->postModel->getInsertID();

    //     return $data;
    // }

    public function create()
    {
        $rules = [
            'title' => 'required|min_length[3]',
            'content' => 'required',
            'category' => 'required'
        ];

        if (!$this->validate($rules)) {
            return ['errors' => $this->validator->getErrors()];
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'user_id' => $this->userId, // Pastikan userId ada di controller
            'category' => $this->request->getPost('category'),
            'status' => $this->request->getPost('status') ?? 'draft'
        ];

        $this->postModel->insert($data);
        $id['id'] = $this->postModel->getInsertID();
        dd($data);
        return view('posts/show', $id);
    }

    // Update an existing post and return updated data
    public function update($id = null)
    {
        if ($id === null || !$this->postModel->find($id)) {
            return ['error' => 'Post not found'];
        }

        $rules = [
            'title' => 'required|min_length[3]',
            'content' => 'required'
        ];

        if (!$this->validate($rules)) {
            return ['errors' => $this->validator->getErrors()];
        }

        // Retrieve existing post data to retain the old image if needed
        $existingPost = $this->postModel->find($id);
        $imagePath = $existingPost['featured_image'] ?? null;

        $file = $this->request->getFile('featured_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old image if it exists
            if (!empty($existingPost['featured_image']) && file_exists(FCPATH . $existingPost['featured_image'])) {
                unlink(FCPATH . $existingPost['featured_image']);
            }
            // Build a unique filename for the new image
            $newName = $file->getRandomName() . '_' . $this->userId . '_' . url_title($this->request->getPost('title'));
            $file->move(WRITEPATH . '../public/uploads', $newName);
            $imagePath = '/uploads/' . $newName;
        }

        $data = [
            'id' => $id,
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'featured_image' => $imagePath,
            'status' => $this->request->getPost('status') ?? 'draft'
        ];

        $this->postModel->save($data);
        return $data;
    }

    // Delete a post and return a confirmation message
    public function delete($id = null)
    {
        if ($id === null || !$this->postModel->find($id)) {
            return ['error' => 'Post not found'];
        }

        // Optionally: delete the image file if it exists
        $existingPost = $this->postModel->find($id);
        if (!empty($existingPost['featured_image']) && file_exists(FCPATH . $existingPost['featured_image'])) {
            unlink(FCPATH . $existingPost['featured_image']);
        }

        $this->postModel->delete($id);
        return ['message' => 'Post deleted successfully'];
    }
}
