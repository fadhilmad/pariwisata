<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table            = 's1g_komentar_pariwisata';
    protected $primaryKey       = 'id_komentar';
    protected $allowedFields    = ['id_komentar', 'id_pariwisata', 'isi', 'tanggal', 'rating', 'id_user'];
    function get_komentar($id_pariwisata)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('s1g_user', $this->table . '.id_user = s1g_user.id_user');
        $builder->where(['id_pariwisata' => $id_pariwisata]);
        $query = $builder->get();
        return $query->getResult();
    }
}
