<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\RedirectResponse;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/service-list');
        }
        return view('index');
    }

    public function auth(): RedirectResponse
    {
        $session = session();
        $userModel = new UsersModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'username' => $user['username'],
                'name' => $user['name'],
                'user_id' => $user['user_id'],
                'logged_in' => true,
            ]);
            return redirect()->to('/service-list'); // Change to your desired path
        }

        $session->setFlashdata('error', 'Invalid username or password');
        return redirect()->back();
    }

    public function logout(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
