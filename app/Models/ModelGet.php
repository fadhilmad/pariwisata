<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGet extends Model
{
    function getData($table, $where = null)
    {
        $builder = $this->db->table($table);
        $builder->select('*');
        if ($where != null) {
            $builder->where($where);
        }
        $query = $builder->get();
        return $query->getResult();
    }
    function cek_judul($table, $where)
    {
        return $this->db->table($table)->getWhere($where)->getRowArray() > 0 ? true : false;
    }
}
