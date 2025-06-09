<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\ServiceModel;
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
        $serviceModel = new ServiceModel();
        $user_id = session()->get('user_id');
        $services = $serviceModel->where('user_id', $user_id)->findAll();
        return view('service-list', ['service' => $services]);
    }

    public function servicedetail($service_id)
    {
        $ServiceModel = new ServiceModel();
        $ServiceModel1 = $ServiceModel->gettabservice($service_id);
        $getTabServicecontet = $ServiceModel->getTabServicecontet($service_id);
        
        return view('service-detail', ['service_detail'=> $ServiceModel1, 'getTabServicecontet'=> $getTabServicecontet]);
    }


}
?>