<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 's1g_admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama', 'username', 'password', 'email', 'profile_img', 'level', 'status', 'no_hp', 'alamat'];
}

/* End of file UserModel.php */
