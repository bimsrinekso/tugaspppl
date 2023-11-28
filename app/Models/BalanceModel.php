<?php

namespace App\Models;

use CodeIgniter\Model;

class BalanceModel extends Model
{
    protected $table      = 'balance';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'amount',
        'transactionID',
        'catBlc',
        'remark',
        'actionBy',
        'type'
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    
    public function getAll()
    {
        $this->select('balance.id as idBlc,balance.created_at as tglbuat,balance.type as typeBlc,username,amount,transactionID,actionBy,remark,typeName,namaCatBlc');
        $this->join('users','users.id = balance.actionBy');
        $this->join('balanceType','balanceType.id = balance.type');
        $this->join('balanceCategory','balanceCategory.id = balance.catBlc');
        return $this->findAll();
    }
}