<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'product';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'nama_produk',
        'categoryPr',
        'harga'
    ];

    protected $useTimestamps = true;

    public function getProduct()
    {
        return $this->findAll();
    }

}