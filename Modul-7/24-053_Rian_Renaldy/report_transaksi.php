<?php
$conn = mysqli_connect("localhost", "root", "", "toko");

$errors = [];
$data = [];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $tgl_awal = $_POST["tgl_awal"];
    $tgl_akhir = $_POST["tgl_akhir"];
    $today = date("Y-m-d");

    $data = [
        'tgl_awal' => $tgl_awal,
        'tgl_akhir' => $tgl_akhir,
    ];

    if (!$tgl_awal || !$tgl_akhir) {
        $error = "Tanggal awal dan tanggal akhir wajib diisi!";
    } elseif ($tgl_awal > $today || $tgl_akhir > $today) {
        $error = "Tanggal tidak boleh lebih dari tanggal hari ini!";
    }elseif ($tgl_awal > $tgl_akhir) {
        $error = "Tanggal awal tidak boleh lebih besar dari tanggal akhir!";
    }else {
        header("Location: hasil_report_transaksi.php?tgl_awal=$tgl_awal&tgl_akhir=$tgl_akhir");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Laporan Penjualan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
        .btn-tampil {
            background-color: #28a745;
            color: white;
            padding:8px;
            text-decoration: none;
            border-radius: 5px;
            border : none;
        }
        .btn-tampil:hover {
            background-color: #228e3bff;
        }
        .error{
            padding: 0 20px 20px 20px;
            color: red;
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
        <div class="header-bawah">Rekap Laporan Penjualan</div>
        <div class="button">
            <a href="transaksi.php" class="btn-kembali"><i class="bi bi-chevron-left"></i>Kembali</a>
        </div>
        <form action="" method="POST">
            <div class="container-konten">
                <input type="date" name="tgl_awal" value="<?= htmlspecialchars($data['tgl_awal'] ?? ''); ?>">
                <input type="date" name="tgl_akhir" value="<?= htmlspecialchars($data['tgl_akhir'] ?? ''); ?>">
                <button type="submit" class="btn-tampil">Tampilkan</button>
                <br>
            </div>
            <?php if (!empty($error)): ?><div class="error"><span><?= $error ?></span></div><?php endif; ?>
        </form>
    </div>
</body>
</html>