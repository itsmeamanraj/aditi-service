<?php

namespace App\Models;

use CodeIgniter\Model;

class servicetab extends Model
{
    protected $table = 'service_tab';              // Your database table
    protected $primaryKey = 'id';
    protected $allowedFields = ['tab_name', 'created_at']; // Add more fields if needed
    protected $useTimestamps = false;
    protected $returnType = 'array';

}
