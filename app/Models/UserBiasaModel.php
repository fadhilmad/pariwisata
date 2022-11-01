<?php

namespace App\Models;

use CodeIgniter\Model;

class UserBiasaModel extends Model
{
    protected $table = 's1g_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'nama', 'password', 'email', 'foto'];
}
