<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriAcara extends Model
{
    protected $table = 's1g_kategori_acara';
    protected $primaryKey = 'id_kategori_acara';
    protected $allowedFields = ['id_kategori_acara', 'kategori_acara', 'slug'];
    function cekKategori($id_kategori_acara)
    {
        return $this->db->table('s1g_acara')->getWhere(['id_kategori_acara' => $id_kategori_acara])->getRowArray() > 0 ? true : false;
    }
}
