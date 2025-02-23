<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek apakah user sudah login dan apakah perannya admin
        if (!session()->get('logged_in') || session()->get('role') !== 'superadmin') {
            return redirect()->to('/datakader')->with('error', 'Akses ditolak! Anda bukan admin.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu tindakan setelah request
    }
}
