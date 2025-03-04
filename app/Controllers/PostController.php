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

    public function show($id)
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
        $data['post'] = $this->postModel->find($id['id']);
        return view('posts/show', $data);
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
            return $this->response->setJSON(['error' => 'Post not found']);
        }

        // Ambil data post sebelum dihapus
        $existingPost = $this->postModel->find($id);

        // 1. **Hapus featured image (jika ada)**
        if (!empty($existingPost['featured_image'])) {
            $featuredImagePath = FCPATH . $existingPost['featured_image'];
            if (file_exists($featuredImagePath)) {
                unlink($featuredImagePath);
            }
        }

        // 2. **Hapus semua gambar dalam konten post (jika ada)**
        preg_match_all('/<img.*?src=["\'](.*?)["\']/i', $existingPost['content'], $matches);
        if (!empty($matches[1])) {
            foreach ($matches[1] as $imagePath) {
                $fullImagePath = FCPATH . parse_url($imagePath, PHP_URL_PATH);
                if (file_exists($fullImagePath)) {
                    unlink($fullImagePath);
                }
            }
        }

        // 3. **Hapus post dari database**
        $this->postModel->delete($id);

        return $this->response->setJSON(['message' => 'Post deleted successfully']);
    }


    public function publish($id)
    {
        $post = $this->postModel->find($id);
        if (!$post) {
            return $this->response->setJSON(['error' => 'Post tidak ditemukan'])->setStatusCode(404);
        }

        $this->postModel->update($id, ['status' => 'published']);

        return $this->response->setJSON(['success' => 'Post berhasil dipublikasikan.']);
    }

    public function archive($id)
    {
        $post = $this->postModel->find($id);
        if (!$post) {
            return $this->response->setJSON(['error' => 'Post tidak ditemukan'])->setStatusCode(404);
        }

        $this->postModel->update($id, ['status' => 'archived']);

        return $this->response->setJSON(['success' => 'Post berhasil diarsipkan.']);
    }

    public function reloadPosts()
    {
        $posts = $this->postModel->findAll();
        return view('posts/list', ['posts' => $posts]);
    }

}
