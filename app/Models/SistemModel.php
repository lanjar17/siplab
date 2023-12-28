<?php

namespace App\Models;

use CodeIgniter\Model;

class SistemModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_lengkap', 'bio', 'username', 'password', 'nip', 'telepon', 'level', 'avatar', 'instansi', 'status'];

    // Dates
    protected $useTimestamps = true;
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


    //New user belum diterima
    public function belumDiterima()
    {
        return $this->query("SELECT * FROM users WHERE status=0 ORDER BY level")->getResultArray();
    }

    //Banyak new user belum diterima
    public function countbelumDiterima()
    {
        return $this->query("SELECT count(*) as total FROM users WHERE status=0")->getResult();
    }

    public function countUser()
    {
        return $this->query("SELECT count(*) as total FROM users")->getResult();
    }


    //Request Meminjam
    public function request()
    {
        return $this->query("SELECT * FROM peminjaman INNER JOIN users, ruangan WHERE peminjaman.id_user=users.id_user AND peminjaman.id_ruangan=ruangan.id_ruangan AND peminjaman.status_peminjaman='0' ORDER BY tanggal ASC")->getResultArray();
    }


    //Jadwal
    public function jadwal()
    {
        return $this->query("SELECT * FROM jadwal INNER JOIN peminjaman on jadwal.id_peminjaman=peminjaman.id_peminjaman INNER JOIN users on peminjaman.id_user=users.id_user INNER JOIN ruangans on peminjaman.id_ruangan = ruangans.id_ruangan AND status_jadwal!=3")->getResultArray();
    }

    public function hapusJadwal($id_jadwal){
        return $this->query("SELECT * FROM jadwal INNER JOIN peminjaman ON jadwal.id_peminjaman=peminjaman.id_peminjaman AND id_jadwal=' . $id_jadwal")->getResultArray();
    }
}
