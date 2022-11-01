<?php

namespace App\Models;

use CodeIgniter\Model;

class KulinerModel extends Model
{
    protected $table = 's1g_kuliner';
    protected $primaryKey = 'id_kuliner';
    protected $useAutoIncrement     = true;
    protected $allowedFields = ['id_kuliner', 'nama_kuliner', 'gambar_kuliner', 'slug', 'deskripsi_kuliner'];
    function get_kuliner()
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $query = $builder->get();
        return $query->getResult();
    }
    function get_kuliner_where($where)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where($where);
        $query = $builder->get();
        return $query->getRow();
    }
    function getWhere_kuliner($slug)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('slug ', $slug);
        $query = $builder->get();
        return $query->getRow();
    }
}
