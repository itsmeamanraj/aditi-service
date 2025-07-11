<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\ServiceModel;
use App\Models\servicetab;
use App\Models\ServiceTabDataModel;
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
        $user_id = session()->get('user_id');
        $ServiceModel = new ServiceModel();
        $ServiceTabModel = new servicetab();
        $TabDataModel = new ServiceTabDataModel();

        $service = $ServiceModel->gettabservice($service_id);

        $serviceTabs = $ServiceTabModel->where('user_id', $user_id)->findAll();

        $tabContentRaw = $TabDataModel->where('service_id', $service_id)->findAll();

        $tabContent = [];
        foreach ($tabContentRaw as $item) {
            $tabContent[$item['tab_id']] = $item['user_input'];
        }

        return view('service-detail', ['service_detail'=> $service, 'service_tab' => $serviceTabs, 'getTabServicecontet'=> $tabContent]);
    }


}
?>