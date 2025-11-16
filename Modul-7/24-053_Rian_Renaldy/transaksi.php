<?php
$conn = mysqli_connect("localhost", "root", "", "toko");

$query_transaksi = " SELECT transaksi.*, pelanggan.nama AS nama_pelanggan FROM transaksi
INNER JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id 
ORDER BY transaksi.id ASC
";
$result_transaksi = mysqli_query($conn, $query_transaksi);

if (isset($_GET["id"])){
    $id = $_GET['id'];
    $query = "DELETE FROM transaksi WHERE id = $id";
    if (mysqli_query($conn, $query)){
        header("Location: transaksi.php");
        exit;
    }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Transaksi</title>
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
            text-align: right;
            margin: 25px 20px;
        }
        .btn-lihat-laporan {
            background-color: #17a2b8;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-tambah {
            background-color: #28a745;
            color: white;
            padding:10px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-lihat-laporan:hover {
            background-color: #11889aff;
        }
        .btn-tambah:hover {
            background-color: #228e3bff;
        }
        .container-tabel {
            padding: 0 20px 20px 20px;
        }
        table {
            width: 100%;
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
        .btn-detail{
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            background-color: #17a2b8;
        }
        .btn-hapus{
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            background-color: #dc3545;
        }
        .btn-detail:hover {
            background-color: #11889aff;
        }
        .btn-hapus:hover {
            background-color: #a72633ff;
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
        <div class="header-bawah">Data Master Transaksi</div>
        <div class="button">
            <a href="report_transaksi.php" class="btn-lihat-laporan">Lihat Laporan Penjualan</a>
            <a href="#" class="btn-tambah">Tambah Transaksi</a>
        </div>

        <div class="container-tabel">
            <table>
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>waktu transaksi</th>
                    <th>Nama Pelanggan</th>
                    <th>Keterangan</th>
                    <th>Total</th>
                    <th>Tindakan</th>
                </tr>
                <?php 
                    $no = 1; 
                    while($row = mysqli_fetch_assoc($result_transaksi)): 
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['waktu_transaksi'] ?></td>
                    <td><?= $row['nama_pelanggan'] ?></td>
                    <td><?= $row['keterangan'] ?></td>
                    <td><?= "Rp " . number_format($row['total'], 0, ',', '.') ?></td>
                    <td>
                        <div class="btn-container">
                            <a href="#" class="btn-detail">Lihat Detail</a>
                            <a href="transaksi.php?id=<?php echo $row["id"]?>" onclick="return confirm('Anda yakin akan menghapus transaksi ini?')" class="btn-hapus">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>
</html>