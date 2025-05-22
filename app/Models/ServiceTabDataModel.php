<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceTabDataModel extends Model
{
    protected $table = 'service_tab_data';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'service_id',
        'tab_id',
        'user_input',
        'created_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // optional if you don’t have an updated_at

    // You can define validation rules here if needed
    protected $validationRules = [
        'tab_id' => 'required|integer',
        'user_input' => 'permit_empty|string',
    ];
}
