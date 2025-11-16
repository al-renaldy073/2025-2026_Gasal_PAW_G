<?php
$conn = mysqli_connect("localhost", "root", "", "toko");

$tgl_awal = $_GET['tgl_awal'];
$tgl_akhir = $_GET['tgl_akhir'];
$tgl_akhir_full = $tgl_akhir . " 23:59:59";

header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment;filename=laporan_penjualan.xls");

$q = mysqli_query($conn, "SELECT * FROM transaksi WHERE waktu_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir_full'
ORDER BY waktu_transaksi ASC");

$summary = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id) AS jumlah_pelanggan, SUM(total) AS total_pendapatan
FROM transaksi WHERE waktu_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir_full'"));
?>

<table border="1">
    <tr>
        <th colspan="3">Rekap Laporan Penjualan <?= $tgl_awal ?> sampai <?= $tgl_akhir ?></th>
    </tr>
    <tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($q)) {
        echo "
        <tr>
            <td>{$no}</td>
            <td>Rp " . number_format($row['total'], 0, ',', '.') . "</td>
            <td>" . date('d-M-y', strtotime($row['waktu_transaksi'])) . "</td>
        </tr>";
        $no++;
    }
    ?>
</table>
<br>
<table border="1">
    <tr>
        <th>Jumlah Pelanggan</th>
        <th>Total Pendapatan</th>
    </tr>
    <tr>
        <td><?= $summary['jumlah_pelanggan'] ?> Orang</td>
        <td>Rp <?= number_format($summary['total_pendapatan'], 0, ',', '.') ?></td>
    </tr>
</table>