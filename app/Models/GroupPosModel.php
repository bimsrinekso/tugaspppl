<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupPosModel extends Model
{
    protected $table      = 'groupPos';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'amount',
        'trxID',
        'qty',
        'prID',
        'prName',
        'prAmt',
        'subTotal'
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    
}