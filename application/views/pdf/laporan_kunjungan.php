<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kunjungan</title>
    <style>
        body { font-family: sans-serif; font-size: 10px; }
        h1, h2 { text-align: center; margin: 0; padding: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px;}
        th, td { border: 1px solid #333; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <h1>Laporan Kunjungan</h1>
    <h2>Rutan Kelas IIA Batam</h2>
    <?php if ($tanggal_mulai && $tanggal_selesai): ?>
        <p class="text-center">Periode: <?php echo date('d F Y', strtotime($tanggal_mulai)) . ' - ' . date('d F Y', strtotime($tanggal_selesai)); ?></p>
    <?php endif; ?>
    <hr>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tgl. Kunjungan</th>
                <th>Pengunjung</th>
                <th>Warga Binaan</th>
                <th>Status</th>
                <th>Diverifikasi Oleh</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($kunjungan_data)) : ?>
                <?php $no = 1; ?>
                <?php foreach ($kunjungan_data as $k) : ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($k->tanggal_kunjungan)); ?></td>
                        <td><?php echo $k->nama_pengunjung; ?></td>
                        <td><?php echo $k->nama_wbp; ?></td>
                        <td><?php echo $k->status; ?></td>
                        <td><?php echo $this->User_model->get_user_by_id($k->approved_by_id)->name ?? '-'; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr><td colspan="6" class="text-center">Tidak ada data pada periode ini.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
