<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Crud extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'alamat', 'pekerjaan'];

    public function getUsers()
    {
        return $this->findAll();
    }
}
