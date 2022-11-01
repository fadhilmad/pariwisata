<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAcara extends Model
{
    protected $table = 's1g_acara';
    protected $primaryKey = 'id_acara';
    protected $allowedFields = ['id_acara', 'nama_tempat', 'id_kategori_acara', 'slug_acara', 'tanggal_acara', 'gambar_acara', 'deskripsi_acara'];
    function list($where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        if ($where != null) {
            $builder->where($where);
            $builder->join('s1g_kategori_acara', 's1g_kategori_acara.id_kategori_acara =' . $this->table . '.id_kategori_acara');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->join('s1g_kategori_acara', 's1g_kategori_acara.id_kategori_acara =' . $this->table . '.id_kategori_acara');
            $query = $builder->get();
            return $query->getResult();
        }
    }
    function list_where_result($where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');

        $builder->where($where);
        $builder->join('s1g_kategori_acara', 's1g_kategori_acara.id_kategori_acara =' . $this->table . '.id_kategori_acara');
        $query = $builder->get();
        return $query->getResult();
    }
    function list_array($where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where($where);
        $builder->join('s1g_kategori_acara', 's1g_kategori_acara.id_kategori_acara =' . $this->table . '.id_kategori_acara');
        $query = $builder->get();
        return $query->getResultArray();
    }
    function get_acara_row($where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('s1g_kategori_acara', 's1g_kategori_acara.id_kategori_acara =' . $this->table . '.id_kategori_acara');
        if ($where != null) {
            $builder->where($where);
            $query = $builder->get();
            return $query->getRow();
        } else {
            $query = $builder->get();

            return $query->getResult();
        }
    }
    function list_kategori($where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        if ($where != null) {
            $builder->where($where);
            $builder->join('s1g_kategori_acara', 's1g_kategori_acara.id_kategori_acara =' . $this->table . '.id_kategori_acara');
            $query = $builder->get();
            return $query->getResult();
        } else {
            $builder->join('s1g_kategori_acara', 's1g_kategori_acara.id_kategori_acara =' . $this->table . '.id_kategori_acara');
            $query = $builder->get();
            return $query->getResult();
        }
    }
    function get_kat_acara_count()
    {
        $builder = $this->db->table($this->table);
        $builder->select('s1g_kategori_acara.id_kategori_acara,s1g_kategori_acara.slug,s1g_kategori_acara.kategori_acara,COUNT(s1g_acara.id_kategori_acara) as jml_kat');
        $builder->join('s1g_kategori_acara', 's1g_kategori_acara.id_kategori_acara =' . $this->table . '.id_kategori_acara');
        $builder->groupBy('s1g_acara.id_kategori_acara');
        $query = $builder->get();
        return $query->getResult();
    }
}
