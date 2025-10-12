<?php

$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is " . $height['Andy'] . " cm tall";

echo "<br>";

// 3.3.1 Tambahkan 5 data baru
$height["Rian"] = "170";
$height["Nisa"] = "155";
$height["Adil"] = "130";
$height["Firda"] = "167";
$height["Zauki"] = "180";

// tampilkan nilai indeks terakhir
$lastkey = array_key_last($height);
echo "Indeks terakhir pada array adalah '$lastkey' dengan nilai: " . $height[$lastkey] . "<br>";

// 3.3.1 Hapus 1 data
echo "Menghapus data dari Zauki<br>";
unset($height["Zauki"]);

// Tampilkan indeks terakhir setelah dihapus
$tertinggi_setelah_dihapus = array_key_last($height);
echo "Indeks terakhir setelah dihapus adalah '$tertinggi_setelah_dihapus' dengan nilai: " . $height[$tertinggi_setelah_dihapus] . "<br>";

// 3.3.3 Buat array baru
$weight = array("Adit"=>50, "Sopo"=>90, "Jarwo"=>68);

// Tampilkan data ke-2 dari array
$weightValues = array_values($weight);
$weightkeys  = array_keys($weight); 
echo "Data ke-2 dari array weight adalah $weightkeys[1] dengan berat $weightValues[1]";

?>