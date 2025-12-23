<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class GallariesModel extends Model
{
   
    protected $table = 'gallaries';
    protected $primaryKey = 'id';
    protected $allowedFields = ['gallaries','gallaries_desc','created_on','updated_on'];
    protected $returnType = 'array';
}