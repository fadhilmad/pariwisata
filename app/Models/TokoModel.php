<?php

namespace App\Models;

use CodeIgniter\Model;

class TokoModel extends Model
{
    protected $table            = 's1g_toko';
    protected $primaryKey       = 'id_toko';
    protected $allowedFields    = ['id_toko', 'id_kuliner', 'nama_toko', 'slug_toko', 'alamat', 'foto'];
    function get_toko($where)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('s1g_kuliner', 's1g_toko.id_kuliner=s1g_kuliner.id_kuliner', 'left');
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }
    function get_toko_row($where)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('s1g_kuliner', 's1g_toko.id_kuliner=s1g_kuliner.id_kuliner', 'left');
        $builder->where($where);
        $query = $builder->get();
        return $query->getRow();
    }
}
