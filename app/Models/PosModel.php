<?php

namespace App\Models;

use CodeIgniter\Model;

class PosModel extends Model
{
    protected $table      = 'pos';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'amount',
        'transactionID',
        'cashIn',
        'cashOut',
        'totalAmt',
        'actionBy'
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}