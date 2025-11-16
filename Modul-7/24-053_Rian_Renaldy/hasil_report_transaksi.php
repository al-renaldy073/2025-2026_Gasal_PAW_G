<?php
$conn = mysqli_connect("localhost", "root", "", "toko");

$tgl_awal = $_GET['tgl_awal'] ?? '';
$tgl_akhir = $_GET['tgl_akhir'] ?? '';

if ($tgl_awal && $tgl_akhir) {
    $tgl_akhir_full = $tgl_akhir . " 23:59:59";
} else {
    $tgl_akhir_full = "";
}

$query_transaksi = "SELECT DATE(waktu_transaksi) AS tanggal, SUM(total) AS total_harian FROM transaksi
WHERE waktu_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir_full' GROUP BY DATE(waktu_transaksi)
ORDER BY tanggal ASC";
$result_transaksi = mysqli_query($conn, $query_transaksi);

$query_summary = "SELECT COUNT(id) AS jumlah_pelanggan, SUM(total) AS jumlah_pendapatan FROM transaksi
WHERE waktu_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir_full'";
$summary = mysqli_fetch_assoc(mysqli_query($conn, $query_summary));

$query_grafik = "SELECT DATE(waktu_transaksi) AS tanggal, SUM(total) AS total_harian FROM transaksi
WHERE waktu_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir_full' GROUP BY DATE(waktu_transaksi)
ORDER BY tanggal ASC";
$grafik = mysqli_query($conn, $query_grafik);

$labels = [];
$data_grafik = [];

while ($row = mysqli_fetch_assoc($grafik)) {
    $labels[] = $row["tanggal"];
    $data_grafik[] = $row['total_harian'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Laporan Penjualan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style> 
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #242424ff;
            padding: 20px 80px;
            color: white;
            display: flex;
            justify-content: space-between;
        }
        .title-1 {
            font-weight: bold;
        }
        .title-2 {
            color : #aaaa;
        }
        .navbar a {
            color: #cfcfcf;
            text-decoration: none;
            margin-left: 15px;
        }
        .navbar a:hover {
            color: white;
        }
        .container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin: 20px 80px;
            overflow: hidden;
        }
        .header-bawah {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
        }
        .text-1{
            font-weight: bold;
        }
        .button {
            margin: 25px 20px;
        }
        .btn-kembali {
            background-color: #007bff;
            color: white;
            padding:8px;
            text-decoration: none;
            border-radius: 5px;
            gap: 6px;
        }
        .btn-kembali:hover {
            background-color: #0161c8ff;
        }
        .container-konten {
            padding: 0 20px 20px 20px;
            gap: 10px;
            display: flex;
        }
        input {
            width: 20%;
            padding: 8px;
            border: 1px solid #bbb;
            border-radius: 5px;
            font-size: 14px;
        }
        .btn-print, .btn-excel {
            background-color: #ffc107;
            color: #333;
            padding:8px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-print:hover, .btn-excel:hover {
            background-color: #e0a800;
        }
        .btn-print i,.btn-excel i {
            margin-right: 6px;
        }
        .container-tabel {
            padding: 0 20px 20px 20px;
        }
        .table-rekap {
            margin-top: 25px ;
            width: 100%;
            border-collapse: collapse;
        }
        .table-jumlah {
            margin-top: 25px ;
            width: 50%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #c4c4c4ff;
            padding: 15px 10px;
        }
        th {
            background-color: #cce5ff;
            text-align: left;
        }
        @media print {
            a, .navbar {
                display: none; 
            }
        } 
        #grafikPenjualan {
            width: 75% !important;
            height: 50% !important;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="header-atas">
            <span class="title-1">Penjualan </span>
            <span class="title-2"> AL_RENALDY</span>
        </div>
        <div>
            <a href="#">Supplier</a>
            <a href="#">Barang</a>
            <a href="#">Transaksi</a>
        </div>
    </div>

    <div class="container">
        <div class="header-bawah"><span class="text-1">Rekap Laporan Penjualan </span><span class="text-2" colspan="3"> <?= $tgl_awal ?> sampai <?= $tgl_akhir ?></span></div>
        <div class="button">
            <a href="report_transaksi.php" class="btn-kembali"><i class="bi bi-chevron-left"></i>Kembali</a>
        </div>

        <div class="container-konten">
            <a onclick="window.print()" class="btn-print"><i class="bi bi-printer"></i></i>Cetak</a>
            <a href="export_excel.php?tgl_awal=<?= $tgl_awal ?>&tgl_akhir=<?= $tgl_akhir ?>" class="btn-excel"><i class="bi bi-file-earmark-excel"></i></i>Excel</a>
        </div>
        <div class="container-tabel">

            <!-- Grafik -->
            <canvas id="grafikPenjualan"></canvas>
            <script>
                var ctx = document.getElementById('grafikPenjualan').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?= json_encode($labels) ?>,
                        datasets: [{
                            label: 'Total Penjualan',
                            data: <?= json_encode($data_grafik) ?>,
                            backgroundColor: ["rgba(81, 81, 81, 0.2)"],
                            borderColor: ["rgba(109, 109, 109, 1)"],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

            <!-- Tabel Rekap -->
            <table class="table-rekap">
                <tr>
                    <th>No</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                </tr>
                <?php 
                    $no = 1; 
                    while($row = mysqli_fetch_assoc($result_transaksi)): 
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= "Rp " . number_format($row['total_harian'], 0, ',', '.') ?></td>
                    <td><?= date('j-M-Y', strtotime($row['tanggal'])) ?></td>
                </tr>
                <?php endwhile; ?>
            </table> 

            <!-- tabel jumlah -->
            <table class="table-jumlah">
                <tr>
                    <th>Jumlah Pelanggan</th>
                    <th>Jumlah Pendapatan</th>
                </tr>
                <tr>
                    <td><?= $summary['jumlah_pelanggan'] ?></td>
                    <td><?= "Rp " . number_format($summary['jumlah_pendapatan'],0,',','.') ?></td>
                </tr>
            </table> 
        </div>
    </div>
</body>
</html>