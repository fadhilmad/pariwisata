<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingAcara extends Model
{
    protected $table            = 's1g_booking_acara';
    protected $primaryKey       = 'id_booking';
    protected $allowedFields = ['id_booking', 'id_user', 'nama_tempat', 'catatan', 'id_kategori_acara', 'tanggal_acara', 'gambar_acara', 'deskripsi_acara', 'status', 'bukti_bayar'];
    function list($where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        if ($where != null) {
            $builder->where($where);
            $builder->join('s1g_kategori_acara', 's1g_kategori_acara.id_kategori_acara =' . $this->table . '.id_kategori_acara');
            $builder->join('s1g_user', 's1g_user.id_user =' . $this->table . '.id_user');
            $query = $builder->get();
            return $query->getRow();
        } else {
            $builder->join('s1g_kategori_acara', 's1g_kategori_acara.id_kategori_acara =' . $this->table . '.id_kategori_acara');
            $builder->join('s1g_user', 's1g_user.id_user =' . $this->table . '.id_user');
            $query = $builder->get();
            return $query->getResult();
        }
    }
    function list_where($where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where($where);
        $builder->join('s1g_kategori_acara', 's1g_kategori_acara.id_kategori_acara =' . $this->table . '.id_kategori_acara');
        $builder->join('s1g_user', 's1g_user.id_user =' . $this->table . '.id_user');
        $query = $builder->get();
        return $query->getResult();
    }
}
