<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
   
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fullname','email','phone','subject','message','created_on'];
    protected $returnType = 'array';
}