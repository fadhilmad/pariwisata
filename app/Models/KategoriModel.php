<?php

namespace App\Models;

use CodeIgniter\Model;


class KategoriModel extends Model
{
    protected $table = 's1g_kategori';
    protected $primaryKey = 'id_kategori';
    protected $useAutoIncrement     = true;
    protected $allowedFields = ['id_kategori', 'nama_kategori', 'slug'];
    function get_kategori()
    {
        return $this->db->table($this->table)->get()->getResult('array');
    }
    function cekKategori($id_kategori)
    {
        return $this->db->table('s1g_pariwisata')->getWhere(['id_kategori' => $id_kategori])->getRowArray() > 0 ? true : false;
    }
}
