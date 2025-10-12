<?php

$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

foreach($height as $x => $x_value) {
    echo "key = " . $x . ", Value = " . $x_value;
    echo "<br>";
}

echo "<br>";

// 3.4.1 Tambah 5 data
$height["Rian"] = "170";
$height["Nisa"] = "155";
$height["Adil"] = "130";
$height["Firda"] = "167";
$height["Zauki"] = "180";

// menampilkan data menggunakan foreach
echo "<b>Data Array Height Setelah Ditambah</b><br>";
foreach($height as $key => $value) {
    echo "Nama: " . $key . ", Tinggi : " . $value . "<br>";
}

echo "<br>";

echo "<b>Jawaban 3.4.1:</b><br>";
echo "Tidak perlu melakukan perubahan pada struktur perulangan FOREACH.<br>";
echo "Karena perulangan FOREACH otomatis akan membaca seluruh elemen yang ada dalam array tanpa harus memperbarui jumlah data secara manual.<br>";
echo "Dengan kata lain, meskipun kita menambahkan 5 data baru ke dalam array \$height, perulangan tetap akan menampilkan semuanya.<br><br>";


// 3.4.2 Buat Array weight
$weight = array("Adit"=>50, "Sopo"=>90, "Jarwo"=>68);

// Menampilkan array weight
echo "<b>Data Array Weight</b><br>";
foreach($weight as $key => $value) {
    echo "Nama: " . $key . ", berat = " . $value . "<br>";
}

echo "<br><b>Jawaban 3.4.2:</b><br>";
echo "Array baru bernama \$weight memiliki 3 data yaitu Adit, Sopo, dan Jarwo.<br>";
echo "Tidak perlu membuat skrip baru secara keseluruhan untuk menampilkan array \$weight.<br>";
echo "Cukup memodifikasi sedikit pada bagian nama variabel array yang digunakan dalam FOREACH.<br>";
echo "Hal ini karena struktur perulangan yang sama sudah bisa digunakan untuk menampilkan array apa pun, selama nama variabel array disesuaikan.<br>";

?>