<?php

namespace App\Models;

use CodeIgniter\Model;


class PariwisataModel extends Model
{
    protected $table = 's1g_pariwisata';
    protected $primaryKey = 'id_pariwisata';
    protected $useAutoIncrement     = true;
    protected $allowedFields = ['id_pariwisata', 'id_kategori', 'nama_pariwisata', 'gambar_pariwisata', 'slug_pariwisata', 'latitude', 'longitude', 'lokasi_pariwisata', 'deskripsi_pariwisata'];
    function get_wisata($where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        if ($where != null) {
            $builder->where($where);
        }
        $builder->join('s1g_kategori', 's1g_kategori.id_kategori =' . $this->table . '.id_kategori');
        $query = $builder->get();
        return $query->getResult();
    }
    function get_wisata_row($where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('s1g_kategori', 's1g_kategori.id_kategori =' . $this->table . '.id_kategori');
        if ($where != null) {
            $builder->where($where);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $query = $builder->get();
            return $query->getResult();
        }
    }
    function get_wisata_count()
    {
        $builder = $this->db->table($this->table);
        $builder->select('s1g_kategori.id_kategori,s1g_kategori.nama_kategori,s1g_kategori.slug,COUNT(s1g_pariwisata.id_kategori) as jml_kat');
        $builder->join('s1g_kategori', 's1g_kategori.id_kategori =' . $this->table . '.id_kategori');
        $builder->groupBy('s1g_pariwisata.id_kategori');
        $query = $builder->get();
        return $query->getResult();
    }

    function getWhere_pariwisata($slug)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('s1g_kategori', 's1g_kategori.id_kategori =' . $this->table . '.id_kategori');
        $builder->where('s1g_pariwisata.id_pariwisata ', $slug);
        $query = $builder->get();
        return $query->getRow();
    }
    function getWhere_wisata($slug)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('s1g_kategori', 's1g_kategori.id_kategori =' . $this->table . '.id_kategori');
        $builder->where('slug_pariwisata ', $slug);
        $query = $builder->get();
        return $query->getRow();
    }
}
