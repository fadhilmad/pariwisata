<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumAcaraModel extends Model
{
    protected $table            = 's1g_album_acara';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'id_acara', 'nama',  'gambar'];
    function get_album_acara($where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        if ($where != null) {
            $builder->where($where);
        }
        $builder->join('s1g_acara', 's1g_acara.id_acara =' . $this->table . '.id_acara');
        $query = $builder->get();
        return $query->getResult();
    }
    function get_album_acara_row($where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        if ($where != null) {
            $builder->where($where);
        }
        $query = $builder->get();
        return $query->getRow();
    }
    function get_album_acara_count()
    {
        $builder = $this->db->table($this->table);
        $builder->select('s1g_acara.id_acara, s1g_acara.nama_tempat,COUNT(s1g_album_acara.id) as jml_album');
        $builder->join('s1g_acara', 's1g_acara.id_acara =' . $this->table . '.id_acara', 'right');
        $builder->groupBy('s1g_acara.id_acara');
        $query = $builder->get();
        return $query->getResult();
    }
}
