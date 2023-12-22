<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table            = 'jadwal';
    protected $primaryKey       = 'id_jadwal';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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


    public function jadwal()
    {
        return $this->query("SELECT * FROM jadwal INNER JOIN peminjaman on jadwal.id_peminjaman=peminjaman.id_peminjaman INNER JOIN users on peminjaman.id_user=users.id_user INNER JOIN ruangan on peminjaman.id_ruangan = ruangan.id_ruangan AND status_jadwal!=3")->getResultArray();
    }

    public function hapusJadwal($id_jadwal)
    {
        return $this->query("SELECT * FROM jadwal INNER JOIN peminjaman ON jadwal.id_peminjaman=peminjaman.id_peminjaman AND id_jadwal=' . $id_jadwal")->getResultArray();
    }
}
