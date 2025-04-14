<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'user'; // nama tabel di database
    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'password']; // kolom yang bisa diisi

    // Fungsi untuk ambil user berdasarkan username
    public function get_user($username)
    {
        return $this->where('username', $username)->first();
    }
}
