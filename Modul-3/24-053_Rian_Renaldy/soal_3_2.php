<?php

$fruits = array("Avocado", "Blueberry", "Cherry");
$arrLength = count($fruits);

echo "<b>Data Array fruits Sebelum Ditambah</b><br>";
for($x = 0; $x < $arrLength; $x++){
    echo $fruits[$x];
    echo "<br>";
}
echo "Panjang array saat ini ($arrLength) <br>";

// 3.2.1. Tambah 5 data baru menggunakan perulangan for
for($i = 0; $i < 5; $i++){
    $fruits[] = "Buah Baru " . ($i +1);
}
$arrLength = count($fruits);

echo "<br><b>Data Array fruits Setelah Ditambah</b>";
for($x = 0; $x < $arrLength; $x++){
    echo "<br>" . $fruits[$x];
}

// panjang array
echo "<br>Panjang array saat ini setelah ditambah($arrLength) <br>";

// Jawaban untuk 3.2.1
echo "<br><b>Jawaban 3.2.1:</b><br>";
echo "Panjang array \$fruits saat ini adalah $arrLength data. <br>";
echo "Tidak perlu mengubah struktur perulangan FOR pada baris 5–8, karena variabel \$arrLength diupdate dengan fungsi count() setelah penambahan data baru. <br>";
echo "Artinya, perulangan otomatis akan menyesuaikan dengan jumlah elemen array yang baru tanpa modifikasi tambahan.<br>";


// 3.2.2 Array baru veggies
$veggies = array("Potato", "Carot", "Broccoli");
$vegLength = count($veggies);

echo "<br><b>Data Array veggies</b><br>";
for($y = 0; $y < $vegLength; $y++) {
    echo $veggies[$y] . "<br>";
}

// Jawaban untuk 3.2.2
echo "<br><b>Jawaban 3.2.2:</b><br>";
echo "Array baru bernama \$veggies memiliki $vegLength data. <br>";
echo "Kita dapat menggunakan struktur FOR yang sama seperti array \$fruits, hanya perlu mengganti nama variabel dan panjang array-nya. <br>";
echo "Tidak perlu membuat skrip baru sepenuhnya, cukup modifikasi sedikit bagian variabel untuk menyesuaikan dengan array baru.<br>";

?>