<?php

$conn = mysqli_connect("localhost", "root", "", "store");

require 'validate.php';
$errors = [];
$data = [];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $alamat = $_POST["alamat"];

    $data = [
        'nama' => $nama,
        'telp' => $telp,
        'alamat' => $alamat,
    ];

    $validNama = validateNama($nama, $errors);
    $validTelp = validateTelp($telp, $errors);
    $validAlamat = validateAlamat($alamat, $errors);
    
    if ($validNama && $validTelp && $validAlamat) {
        $query = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'";
        
        if(mysqli_query($conn, $query)) {
            header("location: index.php");
            exit;
        } 
    }
}

elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM supplier WHERE id='$id'");

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $data = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5ff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h3 {
            color: #0077b6;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        label {
            width: 90px;
            font-weight: bold;
            color: #333;
        }

        label:hover{
            color: #0077b6 ;
        }

        .form-group input[type="text"] {
            flex: 1;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
        }

        input[type="text"]:focus{
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.4);
        }

        .error {
            color: red;
            font-size: 13px;
            margin-left: 90px;
            margin-top: -20px;
            margin-bottom: 6px;
            display: block;
        }

        .btn-container {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            margin-left: 90px;
            margin-top: 10px;
        }

        .btn-update{
            background-color: #28a745;
            padding: 8px 14px;
            border-radius: 4px;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-update:hover{
            background-color: #218838;
        }

        .btn-batal {
            background-color: #d60000ff;
            color: white;
            font-size: 14px; 
            padding: 8px 14px 8px 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-batal:hover {
            background-color: #960000ff;
        }
    </style>
</head>
<body>
    <h3>Update Data Master Supplier Baru</h3>
    <form action="updateData.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($data['id'] ?? '') ?>">
        <div class="form-container">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Nama" value="<?= htmlspecialchars($data['nama'] ?? ''); ?>">
            </div>
                <span class="error"><?php echo $errors['nama'] ?? ""?></span>
            <div class="form-group">
                <label for="telp">Telp</label>
                <input type="text" name="telp" id="telp" placeholder="Telp" value="<?= htmlspecialchars($data['telp'] ?? ''); ?>">
            </div>
                <span class="error"><?php echo $errors['telp'] ?? ""?></span>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="alamat" value="<?= htmlspecialchars($data['alamat'] ?? ''); ?>">
            </div>
                <span class="error"><?php echo $errors['alamat'] ?? ""?></span>
            <div class="btn-container">
                <input type="submit" value="Update" class="btn-update">
                <a href="index.php" class="btn-batal">Batal</a>
            </div>
        </div>
    </form>
</body>
</html>