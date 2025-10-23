<?php

namespace App\Models;

use CodeIgniter\Model;

class KapsterModel extends Model
{
    protected $table            = 'kapsters';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'spesialisasi', 'foto_profil', 'status'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

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

    public function getKapstersWithUserDetails()
    {
        $this->select('kapsters.*, users.nama, users.email, users.no_telpon');
        $this->join('users', 'users.id = kapsters.user_id');
        return $this->findAll();
    }

    /**
     * Find a single Kapster with their user details.
     */
    public function findKapsterWithUserDetails($id)
    {
        $this->select('kapsters.*, users.nama, users.email, users.no_telpon');
        $this->join('users', 'users.id = kapsters.user_id');
        return $this->where('kapsters.id', $id)->first();
    }
}
