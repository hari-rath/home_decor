<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ProductModel extends Model
{
   
    protected $table = 'product_master';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'product_name',
        'product_title',
        'category_id',
        'product_subtitle',
        'product_price',
        'product_description',
        'primary_image',
        'gallery_images',
        'flipkart_links',
        'amazon_links',
        'created_on',
        'updated_on'
    ];
    protected $returnType = 'array';
}





