<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table            = 's1g_feedback';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id', 'nama', 'email', 'pesan'];
    public function list()
    {
        return $this->db->table($this->table)->get()->getResult();
    }
}
