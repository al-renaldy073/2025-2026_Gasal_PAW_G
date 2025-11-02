<?php
$conn = mysqli_connect("localhost", "root", "", "store");
$result = mysqli_query($conn, "SELECT * FROM supplier");

if (isset($_GET["id"])){
    $id = $_GET['id'];
    $query = "DELETE FROM supplier WHERE id = $id";
    if (mysqli_query($conn, $query)){
        header("Location: index.php");
        exit;
    }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 15px 40px 40px 40px;
            background-color: #f5f5f5ff;
        }

        .header {
            color: #0077b6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .btn-tambah {
            background-color: #28a745;
            color: white;
            padding: 8px 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-tambah:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        th {
            background-color: #e3f2fd;
            color: #333;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 15px 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            color: #0077b6;
            background-color: #f2f2f2;
        }

        .btn-edit, .btn-hapus {
            color: white;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            padding: 8px 14px;
            font-size: 14px;
        }

        .btn-edit {
            background-color: #fd7e14;
        }

        .btn-hapus {
            background-color: #dc3545;
        }

        .btn-edit:hover {
            background-color: #e96b0c;
        }

        .btn-hapus:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Data Master Supplier</h2>
        <a href="tambahData.php"><button class="btn-tambah">Tambah Data</button></a>
    </div>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php 
            $no = 1; 
            while($row = mysqli_fetch_assoc($result)): 
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['telp'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td>
                <div class="btn-container">
                    <a href="updateData.php?id=<?php echo $row["id"]?>" class="btn-edit">Edit</a>
                    <a href="index.php?id=<?php echo $row["id"]?>" onclick="return confirm('Anda yakin akan menghapus supplier ini?')" class="btn-hapus">Hapus</a>
                </div>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>