<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryProductModel extends Model
{
    protected $table      = 'categoryProduct';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'categoryName',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    public function getCatMn()
    {
        return $this->findAll();
    }
}