<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table            = 'bookings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['pelanggan_id', 'kapster_id', 'layanan_id', 'tanggal_booking', 'jam_booking', 'status'];

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

    public function getBookings($filters = [])
    {
        $builder = $this->select(
            '
            bookings.*, 
            pelanggan.nama as nama_pelanggan,
            kapster_user.nama as nama_kapster,
            layanans.nama_layanan,
            layanans.harga,
            layanans.durasi_menit'
        )
            ->join('users as pelanggan', 'pelanggan.id = bookings.pelanggan_id')
            ->join('kapsters', 'kapsters.id = bookings.kapster_id')
            ->join('users as kapster_user', 'kapster_user.id = kapsters.user_id')
            ->join('layanans', 'layanans.id = bookings.layanan_id');

        if (!empty($filters['pelanggan_id'])) {
            $builder->where('bookings.pelanggan_id', $filters['pelanggan_id']);
        }
        if (!empty($filters['kapster_id'])) {
            $builder->where('bookings.kapster_id', $filters['kapster_id']);
        }

        return $builder->orderBy('bookings.tanggal_booking', 'DESC')->orderBy('bookings.jam_booking', 'ASC')->findAll();
    }
}
