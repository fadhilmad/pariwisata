<?php

namespace App\Models;

use CodeIgniter\Model;

class PenginapanModel extends Model
{
    protected $table = 's1g_penginapan';
    protected $primaryKey = 'id_penginapan';
    protected $useAutoIncrement     = true;
    protected $allowedFields = ['id_penginapan', 'nama_tempat', 'gambar', 'slug', 'lokasi_tempat', 'deskripsi_tempat', 'latitude', 'longitude'];
    function get_penginapan($where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        if ($where != null) {
            $builder->where($where);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $query = $builder->get();
            return $query->getResult();
        }
    }
    function getWhere_penginapan($slug)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('slug ', $slug);
        $query = $builder->get();
        return $query->getRow();
    }
}
