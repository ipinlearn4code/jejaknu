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
        // Get the logged in user's ID from the session
        $this->userId = session()->get('user_id');

        // Instantiate the postModel once for all methods.
        $this->postModel = new PostModel();
    }

    // Return all posts
    public function index()
    {
        $data['posts'] = $this->postModel->findAll();
        return $data;
    }

    // Return a single post by its id
    public function show($id = null)
    {
        $post = $this->postModel->find($id);
        if ($id === null || !$post) {
            return ['error' => 'Post not found'];
        }
        return ['post' => $post];
    }

    // Return latest published posts (limit 3)
    public function getLatestPosts()
    {
        $data['posts'] = $this->postModel->getLatestPublishedPosts(3);
        return $data;
    }

    // Create a new post and return the created post data
    public function store()
    {
        $rules = [
            'title'          => 'required|min_length[3]',
            'content'        => 'required',
            'featured_image' => 'uploaded[featured_image]|max_size[featured_image,1028]|is_image[featured_image]'
        ];

        if (!$this->validate($rules)) {
            return ['errors' => $this->validator->getErrors()];
        }

        // Handle file upload for featured image
        $file = $this->request->getFile('featured_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Build a unique filename using random name, user id and title
            $newName = $file->getRandomName() . '_' . $this->userId . '_' . url_title($this->request->getPost('title'));
            $file->move(WRITEPATH . '../public/uploads', $newName);
            $imagePath = '/uploads/' . $newName;
        } else {
            $imagePath = null;
        }

        $data = [
            'title'          => $this->request->getPost('title'),
            'content'        => $this->request->getPost('content'),
            'featured_image' => $imagePath,
            'status'         => $this->request->getPost('status') ?? 'draft'
        ];

        $this->postModel->save($data);
        $data['id'] = $this->postModel->getInsertID();

        return $data;
    }

    // Update an existing post and return updated data
    public function update($id = null)
    {
        if ($id === null || !$this->postModel->find($id)) {
            return ['error' => 'Post not found'];
        }

        $rules = [
            'title'   => 'required|min_length[3]',
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
            'id'             => $id,
            'title'          => $this->request->getPost('title'),
            'content'        => $this->request->getPost('content'),
            'featured_image' => $imagePath,
            'status'         => $this->request->getPost('status') ?? 'draft'
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
