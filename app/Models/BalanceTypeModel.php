<?php

namespace App\Models;

use CodeIgniter\Model;

class BalanceTypeModel extends Model
{
    protected $table      = 'balanceType';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'typeName',
    ];

    protected $useTimestamps = true;
}