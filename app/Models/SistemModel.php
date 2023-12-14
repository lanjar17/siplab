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

    public function get_data($table)
    {
        return $this->db->get($table);
    }
    public function get_datawithadd($table, $additional)
    {
        return $this->db->query("SELECT * FROM " . $table . ' ' . $additional);
    }

    public function get_join($table, $join, $where)
    {
        $query = "SELECT * FROM " . $table . " INNER JOIN " . $join . " WHERE " . $where;
        return $this->db->query($query);
    }

    public function getwhere($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    public function add_data($table, $array)
    {
        return $this->db->insert($table, $array);
    }

    public function updatedata($table, $array, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $array);
    }

    public function deletedata($table, $where)
    {
        return $this->db->delete($table, $where);
    }
}
