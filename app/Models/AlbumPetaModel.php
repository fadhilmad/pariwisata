<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumPetaModel extends Model
{
    protected $table            = 's1g_album_peta';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'id_pariwisata', 'nama',  'gambar'];
    function get_album_wisata($where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        if ($where != null) {
            $builder->where($where);
        }
        $builder->join('s1g_pariwisata', 's1g_pariwisata.id_pariwisata =' . $this->table . '.id_pariwisata');
        $query = $builder->get();
        return $query->getResult();
    }
    function get_album_wisata_row($where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        if ($where != null) {
            $builder->where($where);
        }
        $query = $builder->get();
        return $query->getRow();
    }
    function get_album_wisata_count()
    {
        $builder = $this->db->table($this->table);
        $builder->select('s1g_pariwisata.id_pariwisata,s1g_pariwisata.nama_pariwisata,COUNT(s1g_album_peta.id) as jml_album');
        $builder->join('s1g_pariwisata', 's1g_pariwisata.id_pariwisata =' . $this->table . '.id_pariwisata', 'right');
        $builder->groupBy('s1g_pariwisata.id_pariwisata');
        $query = $builder->get();
        return $query->getResult();
    }
}
