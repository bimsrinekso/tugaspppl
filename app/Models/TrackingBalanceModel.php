<?php

namespace App\Models;

use CodeIgniter\Model;

class TrackingBalanceModel extends Model
{
    protected $table      = 'trackingBalance';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'amount',
        'blcCategory',
        'lastBalance',
        'remark',
        'trxID',
    ];

    protected $useTimestamps = true;

}