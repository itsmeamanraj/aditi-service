<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminMOdel extends Model
{
    protected $table = 'admin';              // Your database table
    protected $primaryKey = 'admin_id';
    protected $allowedFields = ['username', 'password', 'admin_id']; // Add more fields if needed
    protected $useTimestamps = true;
    protected $returnType = 'array';
}
