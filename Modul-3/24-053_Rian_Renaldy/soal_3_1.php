<?php

$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ". ";

echo "<br>";

// 3.1.1 Tambahkan 5 data baru
$fruits[] = "Durian";
$fruits[] = "Strawbery";
$fruits[] = "Mango";
$fruits[] = "Banana";
$fruits[] = "Papaya";

// Nilai indeks tertinggi
$indeks_tertinggi = array_key_last($fruits);
echo "Nilai dengan indeks tertinggi ($indeks_tertinggi): " . $fruits[$indeks_tertinggi] . "<br>";

// 3.1.2 Hapus data tertentu
echo "Menghapus data pada indeks 7 (Papaya)<br>";
unset($fruits[7]);

// Nilai indeks tertinggi setelah dihapus
$tertinggi_setelah_dihapus = array_key_last($fruits);
echo "Nilai dengan indeks tertinggi setelah dihapus($tertinggi_setelah_dihapus): " . $fruits[$tertinggi_setelah_dihapus] . "<br>";

// 3.1.3 Buat array baru
$veggies = array("Potato", "Carot", "Broccoli");

// Tampilkan data
foreach($veggies as $veg){
    echo $veg . "<br>";
}

?>