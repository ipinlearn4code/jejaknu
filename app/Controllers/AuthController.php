<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function registerProcess()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        // Cek apakah email sudah terdaftar
        if ($userModel->where('email', $email)->first()) {
            return $this->response->setJSON(['error' => 'Email sudah terdaftar'])->setStatusCode(400);
        }

        // Simpan user baru tanpa role
        $userModel->insert([
            'email' => $email,
            'password' => $password,
            'role' => null // Default user tidak memiliki role
        ]);

        return $this->response->setJSON(['message' => 'Registrasi berhasil, silakan login!']);
    }

    public function loginProcess()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        // // Cek email dan password
//if (!$user || md5($password) !== $user['password']) {
  // return $this->response->setJSON(['error' => 'Email atau password salah'])->setStatusCode(400);
//}


        // Set session
        session()->set([
            'user_id' => $user['id'],
            'email' => $user['email'],
            'role' => $user['role'], // Bisa null atau 'admin'
            'logged_in' => true,
        ]);

        // Redirect berdasarkan role
        if ($user['role'] === 'superadmin') {
            return $this->response->setJSON(['redirect' => base_url('/datakader')]);
        } else {
            return $this->response->setJSON(['redirect' => base_url('/dashboard')]);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
