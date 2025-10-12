<?php

$students = array
(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row Number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
        echo "<li>" . $students[$row][$col] . "</li>";
    }
    echo "</ul>";
}

// 3.5.1 Tambahkan 5 data
$students[] = array("Rian", "220404", "0812345699");
$students[] = array("Nisa",  "220405", "0812345600");
$students[] = array("Adil",   "220406", "0812345611");
$students[] = array("Firda",   "220407", "0812345622");
$students[] = array("Zauki",  "220408", "0812345633");

// 3.5.2 Tampilkan dalam bentuk tabel
echo "<br><h3>Data Students dalam Tabel</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Nama</th><th>NIM</th><th>Nomor HP</th></tr>";

foreach ($students as $row) {
    echo "<tr>";
    echo "<td>" . $row[0] . "</td>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "</tr>";
}

echo "</table>";

?>