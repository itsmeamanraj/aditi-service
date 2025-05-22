<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceMOdel extends Model
{
    protected $table = 'services';              // Your database table
    protected $primaryKey = 'service_id';
    protected $allowedFields = ['user_id', 'service_name', 'project_id', 'website_url', 'whatsapp_number', 'created_at']; // Add more fields if needed
    protected $useTimestamps = true;
    protected $returnType = 'array';

    public function getTabService($serviceId)
    {
        return $this->select('services.*, users.*')
                        ->join('users', 'users.user_id = services.user_id') // ✅ yeh ab sahi hai
                        ->where('services.service_id', $serviceId)
                        ->first();
    }

}
