<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\CLI\Console;
use App\Models\CadreProfileModel;

class AuthController extends BaseController
{
    // public function registerProcess()
    // {
    //     return $this->response->setJSON([
    //         'status' => 'success',
    //         'message' => 'Registrasi berhasil',
    //         'data' => $this->request->getPost()
    //     ]);

    // }

    public function registerProcess()
    {
        $validation = \Config\Services::validation();

        // Aturan validasi
        $rules = [
            'username' => 'required|is_unique[users.username]',
            'nik' => 'required|is_unique[cadre_profiles.nik]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'repeat_password' => 'required|matches[password]',
            'name' => 'required',
            'address' => 'required',
            'education' => 'required',
            'skills' => 'required'
        ];

        // Pesan error kustom
        $messages = [
            'username' => [
                'required' => 'Username wajib diisi!',
                'is_unique' => 'Username sudah digunakan!'
            ],
            'nik' => [
                'required' => 'NIK wajib diisi!',
                'is_unique' => 'NIK sudah digunakan!'
            ],
            'email' => [
                'required' => 'Email wajib diisi!',
                'valid_email' => 'Format email tidak valid!',
                'is_unique' => 'Email sudah terdaftar!'
            ],
            'password' => [
                'required' => 'Password wajib diisi!',
                'min_length' => 'Password minimal 8 karakter!'
            ],
            'repeat_password' => [
                'required' => 'Konfirmasi password wajib diisi!',
                'matches' => 'Konfirmasi password tidak cocok!'
            ]
        ];

        // Jalankan validasi
        if (!$this->validate($rules, $messages)) {
            return $this->response->setJSON([
                'error' => $validation->getErrors()
            ]);
        }

        // Hash password sebelum menyimpan
        $userModel = new \App\Models\UserModel();
        $cadreModel = new \App\Models\CadreProfileModel();

        $userData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'user'
        ];

        $userModel->insert($userData);
        $userId = $userModel->insertID(); // Ambil ID user yang baru disimpan

        // Simpan ke tabel `cadre_profiles`
        $cadreData = [
            'nik' => $this->request->getPost('nik'),
            'user_id' => $userId,
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'education' => $this->request->getPost('education'),
            'skills' => $this->request->getPost('skills')
        ];

        $cadreModel->insert($cadreData);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Registrasi berhasil! Silakan login.'
        ]);
    }




    // public function loginProcess()
    // {
    //     $userModel = new UserModel();
    //     $email = $this->request->getPost('email');
    //     $password = $this->request->getPost('password');

    //     $user = $userModel->where('email', $email)->first();

    //     // // Cek email dan password
    //     if (!$user || md5($password) !== $user['password']) {
    //         return $this->response->setJSON(['error' => 'Email atau password salah'])->setStatusCode(400);
    //     }


    //     // Set session
    //     session()->set([
    //         'user_id' => $user['id'],
    //         'email' => $user['email'],
    //         'role' => $user['role'],
    //         'logged_in' => true,
    //     ]);
    //     return view('vardump', ['data' => session()]);

    //     // Redirect berdasarkan role
    //     // if ($user['role'] === 'superadmin') {
    //     //     return $this->response->setJSON(['redirect' => base_url('')]);
    //     // } else if ($user['role'] === 'member') {
    //     //     return $this->response->setJSON(['redirect' => base_url('/')]);
    //     // }
    // }

    public function loginProcess()
    {
        try {
            $userModel = new UserModel();
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = $userModel->where('email', $email)->orWhere('username', $email)->first();

            // Cek apakah user ditemukan
            if (!$user) {
                return $this->response->setJSON(['error' => 'Email tidak ditemukan'])->setStatusCode(400);
            }

            // Cek password
            if (!password_verify($password, $user['password_hash'])) {
                return $this->response->setJSON(['error' => 'Password salah'])->setStatusCode(400);
            }

            // Set session
            session()->set([
                'user_id' => $user['id'],
                'email' => $user['email'],
                'role' => $user['role'],
                'logged_in' => true,
            ]);

            return $this->response->setJSON([
                'success' => true,
                'redirect' => base_url('/')
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'error' => 'Terjadi kesalahan server: ' . $e->getMessage()
            ])->setStatusCode(500);
        }
    }






    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    public function sessionDebug()
    {
        echo '<pre>';
        print_r(session()->get());
        echo '</pre>';
        exit;
    }

}

