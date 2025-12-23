<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class CategoryModel extends Model
{
   
    protected $table = 'category_master';
    protected $primaryKey = 'id';
    protected $allowedFields = ['category_name','category_primary_image','created_on','updated_on'];
    protected $returnType = 'array';
}