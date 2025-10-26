<?php

// 3.1
echo "<h3>3.1 Regular expressions<br></h3>";
$nama = "Rian";

if (preg_match("/^[a-zA-Z'-]+$/", $nama)) {
    echo "Nama valid (hanya huruf).";
} 

echo "<br><br>";

// 3.2
echo "<h3>3.2 string<br></h3>";
$input = "   Halo Dunia   ";
echo "trim: " . trim($input) . "<br>";        // "Halo Dunia"
echo "lower: " . strtolower($input) . "<br>";  // "   halo dunia   "
echo "toupper: " . strtoupper($input) . "";  // "   HALO DUNIA   "

echo "<br><br>";

// 3.3
echo "<h3>3.3 filter<br></h3>";
$float = "162.1";
$url = "https://example.com";
$ip = "192.168.1.1";
$email = "rianrenaldy073@gmail.com";

if (filter_var($float, FILTER_VALIDATE_FLOAT)) {
    echo "Float valid";
} else {
    echo "Float tidak valid";
}

echo "<br>";

if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo "URL valid";
}

echo "<br>";

if (filter_var($ip, FILTER_VALIDATE_IP)) {
    echo "IP address valid";
}

echo "<br>";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "email valid";
}

echo "<br><br>";

// 3.4
echo "<h3>3.4 type testing<br></h3>";
$nilai = 100;

if (is_int($nilai)) {
    echo "Ini integer" . "<br>";
}

if (is_numeric("123.45")) {
    echo "Ini numerik (bisa integer atau float)" . "<br>";
}

if (is_string("Rian")) {
    echo "Ini string";
}

echo "<br><br>";

echo "<h3>3.5 date<br></h3>";
$tanggal = 10;
$bulan = 04;
$tahun = 2005;

if (checkdate($tanggal, $bulan, $tahun)) {
    echo "Tanggal valid";
} else {
    echo "Tanggal tidak valid";
}


?>