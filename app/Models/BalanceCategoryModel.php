<?php

namespace App\Models;

use CodeIgniter\Model;

class BalanceCategoryModel extends Model
{
    protected $table      = 'balanceCategory';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'namaCatBlc',
        'jenis',
    ];

    protected $useTimestamps = true;
    public function getblCat()
    {
        return $this->findAll();
    }
}