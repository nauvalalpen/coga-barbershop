<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pendapatan Cukur</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h1,
        h3 {
            text-align: center;
            margin: 5px 0;
        }

        h1 {
            font-size: 18px;
        }

        h3 {
            font-size: 14px;
            font-weight: normal;
        }

        hr {
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .text-end {
            text-align: right;
        }

        tfoot {
            font-weight: bold;
            background-color: #e0e0e0;
        }

        /* --- CSS KHUSUS TANDA TANGAN --- */
        .signature-container {
            margin-top: 50px;
            width: 100%;
            /* Trik untuk memposisikan di kanan pada PDF */
            text-align: right;
        }

        .signature-box {
            /* Membuat kotak tanda tangan bersifat inline-block agar bisa di-align right */
            display: inline-block;
            width: 200px;
            text-align: center;
            /* Teks di dalam kotak rata tengah */
        }

        .space-for-sign {
            height: 70px;
            /* Ruang kosong untuk tanda tangan */
        }

        .manager-name {
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Laporan Pendapatan Cukur</h1>
    <h3>Coga Barbershop</h3>
    <hr>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kapster</th>
                <th>Layanan</th>
                <th class="text-end">Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            <?php if (!empty($transaksi)): ?>
                <?php foreach ($transaksi as $item): ?>
                    <tr>
                        <td><?= date('d/m/Y H:i', strtotime($item->created_at)) ?></td>
                        <td><?= esc($item->nama_kapster) ?></td>
                        <td><?= esc($item->nama_layanan) ?></td>
                        <td class="text-end">Rp <?= number_format($item->harga_saat_transaksi, 0, ',', '.') ?></td>
                    </tr>
                    <?php $total += $item->harga_saat_transaksi; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center;">Tidak ada data.</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-end">Total Pendapatan</td>
                <td class="text-end">Rp <?= number_format($total, 0, ',', '.') ?></td>
            </tr>
        </tfoot>
    </table>

    <!-- AREA TANDA TANGAN -->
    <div class="signature-container">
        <div class="signature-box">
            <p>Padang, <?= date('d F Y') ?></p>
            <p>Disahkan oleh</p>

            <div class="space-for-sign"></div>

            <p class="manager-name">
                <?= esc(session()->get('nama')) ?? 'Admin Coga' ?>
            </p>
        </div>
    </div>

</body>

</html>