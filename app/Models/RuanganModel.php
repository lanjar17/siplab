<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $table            = 'ruangans';
    protected $primaryKey       = 'id_ruangan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_ruangan', 'kode_ruangan','nama_ruangan', 'image', 'status_ruangan'];

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

    public function getruangan()
    {
        return $this->query("SELECT * FROM ruangans WHERE status_ruangan='Nganggur'")->getResultArray();
    }

    public function countRuangan()
    {
        return $this->query("SELECT count(*) as total FROM ruangans")->getResult();
    }
}
