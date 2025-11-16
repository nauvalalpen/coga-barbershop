<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pendapatan Cukur</title>
    <style>
        body {
            font-family: sans-serif;
        }

        h1,
        h3 {
            text-align: center;
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
        }

        .text-end {
            text-align: right;
        }

        tfoot {
            font-weight: bold;
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
                        <td><?= date('d M Y, H:i', strtotime($item->created_at)) ?></td>
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
</body>

</html>