<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'id',
        'username',
        'email',
        'avatar',
        'password',
        'role_id'
    ];

    protected $useTimestamps = true;

    public function GetUsers()
    {
        return $this->findAll();
    }



}