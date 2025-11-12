<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    // Properti Inti yang Penting
    protected $table         = 'bookings';
    protected $primaryKey    = 'id';
    protected $returnType    = 'object';
    protected $allowedFields = ['pelanggan_id', 'kapster_id', 'layanan_id', 'tanggal_booking', 'jam_booking', 'status'];

    // Aktifkan pengelolaan kolom 'created_at' dan 'updated_at' secara otomatis
    protected $useTimestamps = true;

    /**
     * Mengambil data booking beserta detail dari tabel lain (join).
     *
     * @param array $filters Opsi filter, misal: ['pelanggan_id' => 1] atau ['kapster_id' => 2]
     * @return array Array objek hasil booking
     */
    public function getBookings(array $filters = [])
    {
        $builder = $this->select(
            '
            bookings.id, 
            bookings.tanggal_booking,
            bookings.jam_booking,
            bookings.status,
            pelanggan.nama as nama_pelanggan,
            kapster_user.nama as nama_kapster,
            layanans.nama_layanan,
            layanans.harga,
            layanans.durasi_menit
            '
        )
            ->join('users as pelanggan', 'pelanggan.id = bookings.pelanggan_id')
            ->join('kapsters', 'kapsters.id = bookings.kapster_id')
            ->join('users as kapster_user', 'kapster_user.id = kapsters.user_id')
            ->join('layanans', 'layanans.id = bookings.layanan_id');

        // Terapkan filter jika ada
        if (!empty($filters['pelanggan_id'])) {
            $builder->where('bookings.pelanggan_id', $filters['pelanggan_id']);
        }
        if (!empty($filters['kapster_id'])) {
            $builder->where('bookings.kapster_id', $filters['kapster_id']);
        }

        // Urutkan berdasarkan tanggal terbaru dan jam paling awal
        return $builder->orderBy('bookings.tanggal_booking', 'DESC')->orderBy('bookings.jam_booking', 'ASC')->findAll();
    }

    // app/Models/BookingModel.php

// ... (properti dan metode getBookings() tetap sama) ...

    /**
     * Memeriksa apakah slot waktu untuk kapster tertentu tersedia.
     *
     * @param int    $kapsterId     ID kapster yang akan di-book.
     * @param string $tanggal       Tanggal booking dalam format 'Y-m-d'.
     * @param string $waktuMulai    Waktu mulai booking dalam format 'H:i:s'.
     * @param int    $durasi        Durasi layanan dalam menit.
     * @return bool                 True jika tersedia, false jika tumpang tindih.
     */
    public function isScheduleAvailable(int $kapsterId, string $tanggal, string $waktuMulai, int $durasi): bool
    {
        // Hitung waktu selesai booking yang baru
        $waktuSelesai = date('H:i:s', strtotime($waktuMulai . " +{$durasi} minutes"));

        // Cari booking lain yang tumpang tindih untuk kapster dan tanggal yang sama
        $overlappingBooking = $this
            ->where('kapster_id', $kapsterId)
            ->where('tanggal_booking', $tanggal)
            ->where('status !=', 'cancelled') // Abaikan booking yang sudah dibatalkan
            ->groupStart()
            // Skenario 1: Booking baru dimulai di tengah booking lain
            // [ booking_lama_mulai ------ booking_lama_selesai ]
            //       [ booking_baru_mulai --- booking_baru_selesai ]
            ->where("'$waktuMulai' >= jam_booking AND '$waktuMulai' < ADDTIME(jam_booking, SEC_TO_TIME(layanans.durasi_menit*60))")

            // Skenario 2: Booking baru selesai di tengah booking lain
            //       [ booking_lama_mulai ------ booking_lama_selesai ]
            // [ booking_baru_mulai --- booking_baru_selesai ]
            ->orWhere("'$waktuSelesai' > jam_booking AND '$waktuSelesai' <= ADDTIME(jam_booking, SEC_TO_TIME(layanans.durasi_menit*60))")

            // Skenario 3: Booking baru "menelan" booking lain
            // [ booking_baru_mulai ------------------ booking_baru_selesai ]
            //      [ booking_lama_mulai -- booking_lama_selesai ]
            ->orWhere("'$waktuMulai' <= jam_booking AND '$waktuSelesai' >= ADDTIME(jam_booking, SEC_TO_TIME(layanans.durasi_menit*60))")
            ->groupEnd()
            ->join('layanans', 'layanans.id = bookings.layanan_id') // Kita butuh join untuk mendapatkan durasi booking yang ada
            ->first();

        // Jika tidak ditemukan booking yang tumpang tindih, maka jadwal tersedia (return true)
        // Jika ditemukan, maka jadwal tidak tersedia (return false)
        return $overlappingBooking === null;
    }
}
