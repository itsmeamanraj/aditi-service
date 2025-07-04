<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersMOdel extends Model
{
    protected $table = 'users';              // Your database table
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username', 'name', 'mobile', 'user_status','email', 'password', 'user_id']; // Add more fields if needed
    protected $useTimestamps = true;
    protected $returnType = 'array';
}
