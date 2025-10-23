<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiCukurModel extends Model
{
    protected $table            = 'transaksi_cukur';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kapster_id', 'layanan_id', 'harga_saat_transaksi'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
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

    public function getTransactions($filters = [])
    {
        $builder = $this->select(
            '
            transaksi_cukur.*, 
            users.nama as nama_kapster, 
            layanans.nama_layanan'
        )
            ->join('kapsters', 'kapsters.id = transaksi_cukur.kapster_id')
            ->join('users', 'users.id = kapsters.user_id')
            ->join('layanans', 'layanans.id = transaksi_cukur.layanan_id');

        // Apply filters
        if (!empty($filters['kapster_id'])) {
            $builder->where('transaksi_cukur.kapster_id', $filters['kapster_id']);
        }
        if (!empty($filters['start_date'])) {
            $builder->where('transaksi_cukur.created_at >=', $filters['start_date']);
        }
        if (!empty($filters['end_date'])) {
            $builder->where('transaksi_cukur.created_at <=', $filters['end_date']);
        }

        return $builder->orderBy('transaksi_cukur.created_at', 'DESC')->findAll();
    }
}
