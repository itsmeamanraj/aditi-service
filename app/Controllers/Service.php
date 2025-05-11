<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\RedirectResponse;

class Service extends BaseController
{
    public function __construct()
    {
        helper('url'); // for redirect
        if (!session()->get('logged_in')) {
            redirect()->to('/')->send(); // Redirect and stop execution
            exit;
        }
    }

    public function index(){
        return view('service-list');
    }

    public function servicedetail()
    {
        return view('service-detail');
    }


}
?>