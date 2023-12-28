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
    protected $allowedFields    = ['id_jadwal', 'id_peminjaman', 'status_jadwal'];

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
        return $this->query("SELECT * FROM jadwal INNER JOIN peminjaman, ruangans, users WHERE jadwal.id_peminjaman=peminjaman.id_peminjaman AND peminjaman.id_ruangan=ruangans.id_ruangan AND peminjaman.id_user=users.id_user AND peminjaman.status_peminjaman!=0")->getResultArray();
    }

    public function hapusJadwal($id_jadwal)
    {
        return $this->query("SELECT * FROM jadwal INNER JOIN peminjaman ON jadwal.id_peminjaman=peminjaman.id_peminjaman AND id_jadwal=' . $id_jadwal")->getResultArray();
    }

    // public function cektersedia()
    // {
    //     return $this->query("SELECT * FROM jadwal INNER JOIN peminjaman, ruangan WHERE jadwal.id_peminjaman=peminjaman.id_peminjaman AND peminjaman.id_ruangan=ruangan.id_ruangan AND jadwal.status_jadwal=1 AND ruangan.id_ruangan=")->getResultArray();
    // }

    public function cekjadwal($id_ruangan)
    {
        return $this->query("SELECT * FROM jadwal INNER JOIN peminjaman, ruangans 
			WHERE jadwal.id_peminjaman=peminjaman.id_peminjaman
			AND peminjaman.id_ruangan=ruangans.id_ruangan
			AND status_jadwal=1
			AND peminjaman.id_ruangan=" . $id_ruangan)->getResultArray();
    }
    public function cekTersedia($id_ruangan)
    {
        $builder = $this->db->table('jadwal');
        $builder->select('*');
        $builder->join('peminjaman', 'jadwal.id_peminjaman = peminjaman.id_peminjaman');
        $builder->join('ruangan', 'peminjaman.id_ruangan = ruangan.id_ruangan');
        $builder->where('jadwal.status_jadwal', 1);
        $builder->where('ruangan.id_ruangan', $id_ruangan);

        $query = $builder->get();

        return $query->getResultArray();
    }

    public function cektersedia2()
    {
        return $this->query("SELECT * FROM jadwal INNER JOIN peminjaman, ruangan WHERE jadwal.id_peminjaman=peminjaman.id_peminjaman AND peminjaman.id_ruangan=ruangan.id_ruangan AND jadwal.status_jadwal=2 AND ruangan.id_ruangan='")->getResult();
    }

    public function countJadwal()
    {
        return $this->query("SELECT count(*) as total FROM jadwal")->getResult();
    }
}
