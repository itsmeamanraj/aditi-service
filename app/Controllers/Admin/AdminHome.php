<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\UsersModel;
use App\Models\servicetab;
use CodeIgniter\HTTP\RedirectResponse;

class AdminHome extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in_admin')) {
            return redirect()->to('admin/dashboard');
        }

        return view('admin/index');
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

        $UsersModel = new UsersModel();
        $UsersModel = $UsersModel->findAll();
        return view('admin/dashboard', ['users' => $UsersModel]);
    }

    public function logout(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to('admin');
    }

    public function create_tab()
    {
        if (!session()->get('logged_in_admin')) {
            return redirect()->to('admin');
        }

        $servicetab = new servicetab();
        $servicetab = $servicetab->findAll();
        return view('admin/create-tab', ['tabs' => $servicetab]);
    }

    public function save_tab()
    {
        $servicetab = new servicetab();

        $tab_name = $this->request->getPost('tab_name');

        if (!empty($tab_name)) {
            $data = ['tab_name' => $tab_name];

            if ($servicetab->insert($data)) {
                return redirect()->back()->with('message', 'Tab saved successfully.');
            } else {
                return redirect()->back()->with('message', 'Failed to save tab.');
            }
        } else {
            return redirect()->back()->with('message', 'Tab name is required.');
        }
    }

    public function delete_tab($id)
    {
        $servicetab = new servicetab();

        if ($servicetab->find($id)) {
            if ($servicetab->delete($id)) {
                return redirect()->back()->with('message', 'Tab deleted successfully.');
            } else {
                return redirect()->back()->with('message', 'Failed to delete tab.');
            }
        } else {
            return redirect()->back()->with('message', 'Tab not found.');
        }
    }

    public function edit_tab()
    {
        $servicetab = new servicetab();

        $tab_name = $this->request->getPost('tab_name');
        $tab_id = $this->request->getPost('id');

        if ($servicetab->find($tab_id)) {
            $data = ['tab_name' => $tab_name];
            if ($servicetab->update($tab_id, $data)) {
                return redirect()->back()->with('message', 'Tab updated successfully.');
            } else {
                return redirect()->back()->with('message', 'Failed to update tab.');
            }
        } else {
            return redirect()->back()->with('message', 'Tab not found.');
        }
    }


}
