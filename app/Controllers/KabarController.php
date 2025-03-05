<?php

namespace App\Controllers;

use App\Models\MessageModel;
use App\Models\UserModel;
use App\Models\CadreProfileModel;
use CodeIgniter\Controller;

class KabarController extends Controller
{
  protected $messageModel;
  protected $userModel;
  protected $session;
  protected $userId;
  protected $cadreProfileModel;

  public function __construct()
  {
    $this->messageModel = new MessageModel();
    $this->userModel = new UserModel();
    $this->cadreProfileModel = new CadreProfileModel();
    $this->userId = session()->get('user_id');
    $this->username = session()->get('username');
    $this->session = session();
  }

  public function index()
  {
    // Ambil 50 pesan terakhir dengan urutan terbaru
    $messages = $this->messageModel->builder()
      ->orderBy('created_at', 'DESC')
      ->limit(50)
      ->get()
      ->getResultArray();

    // Ambil semua user yang terkait dengan pesan
    $userIds = array_column($messages, 'user_id');
    $users = $this->userModel->whereIn('id', $userIds)->findAll();
    $profiles = $this->cadreProfileModel->whereIn('user_id', $userIds)->findAll();

    // Index user dan profile berdasarkan user_id
    $userMap = [];
    foreach ($users as $user) {
      $userMap[$user['id']] = $user;
    }

    $profileMap = [];
    foreach ($profiles as $profile) {
      $profileMap[$profile['user_id']] = $profile;
    }

    // Proses setiap pesan dan tambahkan data user
    foreach ($messages as &$msg) {
      $user = $userMap[$msg['user_id']] ?? null;
      $profile = $profileMap[$msg['user_id']] ?? null;

      // Ambil nama dari profile atau username
      $username = $profile['name'] ?? ($user['username'] ?? 'Fulan');
      $msg['skills'] = $profile['skills'] ?? 'Ahlu Syurga';
      // Tentukan avatar (jika tidak ada, gunakan Dicebear)
      $msg['avatar'] = !empty($user['avatar'])
        ? base_url('uploads/avatars/' . $user['avatar'])
        : 'https://api.dicebear.com/9.x/pixel-art/svg?seed=' . urlencode($username);

      $msg['username'] = $username;
    }

    // Kirim data ke view
    return view('kabar_sejawat/index', ['messages' => $messages]);
  }



  public function create()
  {
    if (!$this->session->has('user_id')) {
      return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $message = $this->request->getPost('message');

    if ($message) {
      $this->messageModel->insert([
        'user_id' => $this->userId,
        'message' => $message,
      ]);
    }

    return redirect()->to('/kabar');
  }
}
