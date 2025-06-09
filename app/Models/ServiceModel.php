<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceMOdel extends Model
{
    protected $table = 'services';              // Your database table
    protected $primaryKey = 'service_id';
    protected $allowedFields = ['user_id', 'service_name', 'project_id', 'website_url', 'whatsapp_number', 'created_at']; // Add more fields if needed
    protected $useTimestamps = false;
    protected $returnType = 'array';

    public function getTabService($serviceId)
    {
        return $this->select('services.*, users.*')
            ->join('users', 'users.user_id = services.user_id')
            ->where('services.service_id', $serviceId)
            ->first();

    }

    public function getTabServicecontet($serviceId)
    {
        return $this->select('std.*, service_tab.*')
            ->join('service_tab_data AS std', 'std.service_id = services.service_id', 'left')
            ->join('service_tab', 'service_tab.id = std.tab_id', 'left')
            ->where('services.service_id', $serviceId)
            ->get()
            ->getResult();

    }

}
