<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table            = 'peminjaman';
    protected $primaryKey       = 'id_peminjaman';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_peminjaman', 'id_user', 'id_ruangan', 'jam_mulai', 'jam_berakhir', 'tanggal', 'keterangan', 'status_peminjaman'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function cekUser($id_user, $id_ruangan)
    {
        $builder = $this->db->table('peminjaman');
        $builder->select('peminjaman.*');
        $builder->join('ruangan', 'peminjaman.id_ruangan = ruangan.id_ruangan');
        $builder->where('peminjaman.id_user', $id_user);
        $builder->where('ruangan.id_ruangan', $id_ruangan);
        $builder->where('peminjaman.status_peminjaman', 0);

        $query = $builder->get();

        return $query->getResultArray();
    }


    public function countPeminjaman()
    {
        return $this->query("SELECT count(*) as total FROM peminjaman")->getResult();
    }

    public function countreqPeminjaman()
    {
        return $this->query("SELECT count(*) as total FROM peminjaman WHERE status_peminjaman=0")->getResult();
    }
}
