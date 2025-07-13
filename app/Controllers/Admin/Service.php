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
            return redirect()->to('Admin/dashboard');
        }

        return view('Admin/index');
    }

    public function edit_services($id)
    {
        $ServiceModel = new ServiceModel();
        $ServiceModel = $ServiceModel->where('user_id', $id)->findAll();
        return view('Admin/service', ['service' => $ServiceModel, 'user_id' => $id]);
    }

    public function edit_tab_services($service_id, $user_id)
    {
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

        return view('admin/view-service', [
            'service' => $service,
            'service_tab' => $serviceTabs,
            'getTabServicecontet' => $tabContent
        ]);
    }
    public function upload_file()
    {
        $file = $this->request->getFile('file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $uploadPath = FCPATH . 'public/uploads/tinymce/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $file->move($uploadPath, $newName);

            return $this->response->setJSON([
                'location' => base_url('public/uploads/tinymce/' . $newName)  // must match exactly
            ]);
        }

        return $this->response->setJSON(['error' => 'Upload failed.']);
    }


    public function save_service_detailed()
    {
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

    public function save_service()
    {
        $serviceModel = new ServiceModel();

        // Get input data from form
        $user_id     = $this->request->getPost('user_id');
        $serviceName = $this->request->getPost('servicename');
        $projectId   = $this->request->getPost('projectid');
        $url         = $this->request->getPost('url');
        $mobile      = $this->request->getPost('mobile');

        // Validate required fields
        if (!empty($serviceName) && !empty($projectId) && !empty($url) && !empty($mobile) && !empty($user_id)) {
            $data = [
                'user_id'       => $user_id,
                'service_name'  => $serviceName,
                'project_id'    => $projectId,
                'website_url'           => $url,
                'whatsapp_number'      => $mobile
            ];

            if ($serviceModel->insert($data)) {
                return redirect()->back()->with('message', 'Service saved successfully.');
            } else {
                return redirect()->back()->with('message', 'Failed to save service.');
            }
        } else {
            return redirect()->back()->with('message', 'All fields are required.');
        }
    }

    public function edit_service_list()
    {
        $serviceModel = new ServiceModel();

        // Get input data from form
        $user_id     = $this->request->getPost('user_id');
        $serviceName = $this->request->getPost('servicename');
        $projectId   = $this->request->getPost('projectid');
        $url         = $this->request->getPost('url');
        $mobile      = $this->request->getPost('mobile');
        $service_id  = $this->request->getPost('service_id');

        // Validate required fields
        if (!empty($service_id) && !empty($serviceName) && !empty($projectId) && !empty($url) && !empty($mobile) && !empty($user_id)) {
            $data = [
                'user_id'         => $user_id,
                'service_name'    => $serviceName,
                'project_id'      => $projectId,
                'website_url'     => $url,
                'whatsapp_number' => $mobile
            ];

            if ($serviceModel->update($service_id, $data)) {
                return redirect()->back()->with('message', 'Service updated successfully.');
            } else {
                return redirect()->back()->with('message', 'Failed to update service.');
            }
        } else {
            return redirect()->back()->with('message', 'All fields are required.');
        }
    }

    public function delete_service($id)
    {
        $serviceModel = new ServiceModel();

        if ($serviceModel->find($id)) {
            if ($serviceModel->delete($id)) {
                return redirect()->back()->with('message', 'Service deleted successfully.');
            } else {
                return redirect()->back()->with('message', 'Failed to delete Service.');
            }
        } else {
            return redirect()->back()->with('message', 'Service not found.');
        }
    }
}
