<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\UsersModel;
use App\Models\ServiceModel;
use App\Models\servicetab;
use App\Models\ServiceTabDataModel;
use CodeIgniter\HTTP\RedirectResponse;

class Service extends BaseController
{
    public function __construct()
    {
        if (session()->get('logged_in_admin')) {
            return redirect()->to('admin/dashboard');
        }

        return view('admin/index');
    }

    public function edit_services($id){
        $ServiceModel = new ServiceModel();
        $ServiceModel = $ServiceModel->where('user_id', $id)->findAll();
        return view('admin/service', ['service' => $ServiceModel]);
    }

    public function edit_tab_services($service_id){
        $ServiceModel = new ServiceModel();
        $servicetab = new servicetab();
        $ServiceModel = $ServiceModel->gettabservice($service_id);
        $servicetab = $servicetab->findAll();
        return view('admin/view-service', ['service' => $ServiceModel, 'service_tab' => $servicetab]);
    }

    public function save_service_detailed(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new ServiceTabDataModel();
            $service_id = $this->request->getPost('service_id'); // if needed
            $userInputs = $this->request->getPost('user_input'); // array: [tab_id => content]

            foreach ($userInputs as $tab_id => $content) {
                if (trim($content) === '') {
                    continue;
                }
                $existing = $model->where('tab_id', $tab_id)
                                ->where('service_id', $service_id)
                                ->first();

                if ($existing) {
                    // Update existing
                    $model->update($existing['id'], [
                        'user_input' => $content
                    ]);
                } else {
                    // Insert new
                    $model->save([
                        'service_id' => $service_id,
                        'tab_id' => $tab_id,
                        'user_input' => $content
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Tabs saved successfully!');
        }
    }

}
?>