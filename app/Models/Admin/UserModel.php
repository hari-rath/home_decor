<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users'; // your table name
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email', 'password'];
    protected $returnType = 'array';
}
