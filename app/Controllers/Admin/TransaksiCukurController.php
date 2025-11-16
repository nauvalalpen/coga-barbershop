<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiCukurModel;
use App\Models\LayananModel;
use App\Models\KapsterModel;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TransaksiCukurController extends BaseController
{
    /**
     * For Kapsters: Show their own transaction records.
     */
    public function index()
    {
        $transaksiModel = new TransaksiCukurModel();

        // Get Kapster ID from the logged-in user's ID
        $kapsterModel = new KapsterModel();
        $kapster = $kapsterModel->where('user_id', session()->get('user_id'))->first();

        $filters = [];
        if (session()->get('role') === 'kapster') {
            $filters['kapster_id'] = $kapster->id;
        }

        $data['transaksi'] = $transaksiModel->getTransactions($filters);
        return view('admin/transaksi_cukur/index', $data);
    }

    /**
     * For Kapsters: Show the form to add a new transaction.
     */
    public function new()
    {
        $layananModel = new LayananModel();
        $data['layanan'] = $layananModel->findAll();
        return view('admin/transaksi_cukur/create', $data);
    }

    /**
     * For Kapsters: Process the new transaction.
     */
    public function create()
    {
        $rules = ['layanan_id' => 'required'];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get Kapster ID and the selected Layanan
        $kapsterModel = new KapsterModel();
        $kapster = $kapsterModel->where('user_id', session()->get('user_id'))->first();

        $layananModel = new LayananModel();
        $layanan = $layananModel->find($this->request->getPost('layanan_id'));

        $transaksiModel = new TransaksiCukurModel();
        $transaksiModel->save([
            'kapster_id' => $kapster->id,
            'layanan_id' => $layanan->id,
            'harga_saat_transaksi' => $layanan->harga,
        ]);

        return redirect()->to('/admin/catatan-cukur')->with('success', 'Catatan berhasil ditambahkan.');
    }

    /**
     * For Kapsters: Show the form to edit a transaction.
     */
    public function edit($id)
    {
        $transaksiModel = new TransaksiCukurModel();
        $layananModel = new LayananModel();

        $data['transaksi'] = $transaksiModel->find($id);
        $data['layanan'] = $layananModel->findAll();

        // Security Check: Ensure the logged-in Kapster owns this record
        $kapsterModel = new KapsterModel();
        $kapster = $kapsterModel->where('user_id', session()->get('user_id'))->first();

        if (!$data['transaksi'] || $data['transaksi']->kapster_id != $kapster->id) {
            return redirect()->to('/admin/catatan-cukur')->with('error', 'Anda tidak memiliki akses untuk mengedit catatan ini.');
        }

        return view('admin/transaksi_cukur/edit', $data);
    }

    /**
     * For Kapsters: Process the update of a transaction.
     */
    public function update($id)
    {
        $rules = ['layanan_id' => 'required'];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $transaksiModel = new TransaksiCukurModel();
        $transaksi = $transaksiModel->find($id);

        // Security Check: Ensure the logged-in Kapster owns this record
        $kapsterModel = new KapsterModel();
        $kapster = $kapsterModel->where('user_id', session()->get('user_id'))->first();

        if (!$transaksi || $transaksi->kapster_id != $kapster->id) {
            return redirect()->to('/admin/catatan-cukur')->with('error', 'Gagal memperbarui. Catatan tidak ditemukan atau bukan milik Anda.');
        }

        // Get the new Layanan to update the price
        $layananModel = new LayananModel();
        $layanan = $layananModel->find($this->request->getPost('layanan_id'));

        $transaksiModel->update($id, [
            'layanan_id' => $layanan->id,
            'harga_saat_transaksi' => $layanan->harga,
        ]);

        return redirect()->to('/admin/catatan-cukur')->with('success', 'Catatan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $transaksiModel = new TransaksiCukurModel();
        $transaksi = $transaksiModel->find($id);

        // Security Check: Ensure the logged-in Kapster owns this record
        $kapsterModel = new KapsterModel();
        $kapster = $kapsterModel->where('user_id', session()->get('user_id'))->first();

        if ($transaksi && $transaksi->kapster_id == $kapster->id) {
            // If the record exists and belongs to the logged-in kapster, delete it.
            $transaksiModel->delete($id);
            return redirect()->to('/admin/catatan-cukur')->with('success', 'Catatan berhasil dihapus.');
        }

        // If the record doesn't exist or doesn't belong to them, show an error.
        return redirect()->to('/admin/catatan-cukur')->with('error', 'Gagal menghapus. Catatan tidak ditemukan atau bukan milik Anda.');
    }

    /**
     * For Admins: Show the main report with filtering.
     */
    public function laporan()
    {
        $transaksiModel = new TransaksiCukurModel();
        $kapsterModel = new KapsterModel();

        // Prepare filters from GET request
        $filters = [
            'kapster_id' => $this->request->getGet('kapster_id'),
            'start_date' => $this->request->getGet('start_date'),
            'end_date' => $this->request->getGet('end_date'),
        ];

        $data['transaksi'] = $transaksiModel->getTransactions($filters);
        $data['kapsters'] = $kapsterModel->getKapstersWithUserDetails(); // For the filter dropdown
        $data['filters'] = $filters; // To show current filter values in the view

        return view('admin/transaksi_cukur/laporan', $data);
    }

    public function export($type)
    {
        $transaksiModel = new \App\Models\TransaksiCukurModel();

        // Ambil filter yang sama dari URL (query string)
        $filters = [
            'kapster_id' => $this->request->getGet('kapster_id'),
            'start_date' => $this->request->getGet('start_date'),
            'end_date'   => $this->request->getGet('end_date'),
        ];

        $data['transaksi'] = $transaksiModel->getTransactions($filters);

        if ($type === 'pdf') {
            $this->exportPdf($data);
        } elseif ($type === 'excel') {
            $this->exportExcel($data);
        } else {
            return redirect()->back()->with('error', 'Tipe ekspor tidak valid.');
        }
    }

    /**
     * Private helper method to generate PDF.
     */
    private function exportPdf($data)
    {
        $filename = 'Laporan_Pendapatan_Cukur_' . date('Y-m-d') . '.pdf';

        // Buat view khusus untuk PDF (HTML sederhana)
        $html = view('admin/transaksi_cukur/laporan_pdf', $data);

        // Inisialisasi dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // Atur ukuran kertas
        $dompdf->render();

        // Output file PDF ke browser
        $dompdf->stream($filename);
    }

    /**
     * Private helper method to generate Excel.
     */
    private function exportExcel($data)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header
        $sheet->setCellValue('A1', 'Tanggal');
        $sheet->setCellValue('B1', 'Kapster');
        $sheet->setCellValue('C1', 'Layanan');
        $sheet->setCellValue('D1', 'Harga');

        // Isi data
        $row = 2;
        $total = 0;
        foreach ($data['transaksi'] as $item) {
            $sheet->setCellValue('A' . $row, date('d M Y, H:i', strtotime($item->created_at)));
            $sheet->setCellValue('B' . $row, $item->nama_kapster);
            $sheet->setCellValue('C' . $row, $item->nama_layanan);
            $sheet->setCellValue('D' . $row, $item->harga_saat_transaksi);
            $total += $item->harga_saat_transaksi;
            $row++;
        }

        // Tambahkan total
        $sheet->setCellValue('C' . ($row + 1), 'Total Pendapatan');
        $sheet->setCellValue('D' . ($row + 1), $total);

        // Format
        $sheet->getStyle('A1:D1')->getFont()->setBold(true);
        $sheet->getStyle('D' . ($row + 1))->getFont()->setBold(true);
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);

        $filename = 'Laporan_Pendapatan_Cukur_' . date('Y-m-d') . '.xlsx';

        // Buat writer dan kirim ke browser
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode($filename) . '"');
        $writer->save('php://output');
        exit();
    }
}
