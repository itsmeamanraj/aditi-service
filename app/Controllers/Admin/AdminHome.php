<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\HTTP\RedirectResponse;

class AdminHome extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in_admin')) {
            return redirect()->to('admin/dashboard');
        }

        return view('admin/index'); // Your login view
    }

    public function auth(): RedirectResponse
    {
        $session = session();
        $userModel = new AdminModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'username' => $user['username'],
                'admin_id' => $user['admin_id'],
                'logged_in_admin' => true,
            ]);
            return redirect()->to('admin/dashboard');
        }

        $session->setFlashdata('error', 'Invalid username or password');
        return redirect()->back();
    }

    public function dashboard()
    {
        if (!session()->get('logged_in_admin')) {
            return redirect()->to('admin');
        }

        return view('admin/dashboard');
    }

    public function logout(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to('admin');
    }
}
