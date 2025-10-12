<?php

echo "<h2>3.6 Eksplorasi Lanjut Terhadap Array</h2>";

$fruits = array("Apple", "Orange", "Banana");
$moreFruits = array("Strawbery", "Durian");

// 3. 6. 1. Implementasi fungsi array_push()
array_push($fruits, "Mango", "Papaya");
echo "<b>Setelah array_push:</b><br>";
print_r($fruits);
echo "<br><br>";

// 3. 6. 2. Implementasi fungsi array_merge()
echo "<b>Setelah array_merge:</b><br>";
$mergedFruits = array_merge($fruits,$moreFruits);
print_r($mergedFruits);
echo "<br><br>";

// 3. 6. 3. Implementasi fungsi array_values()
$weight = array(
    "Adit" => 50,
    "Sopo" => 90,
    "Jarwo" => 68
);

echo "<b>array_values (mengambil value dari array tanpa key-nya):</b><br>";
$arvalues = array_values($weight);
print_r($arvalues);
echo "<br><br>";

// 3. 6. 4. Implementasi fungsi array_search()
$searchKey = array_search("Durian", $mergedFruits);
echo "<b>array_search 'Durian':</b> Index ditemukan di => $searchKey<br><br>";

// 3. 6. 5. Implementasi fungsi array_filter()
$filtered = array_filter($mergedFruits, function($item) {
    return strlen($item) > 5;
});
echo "<b>array_filter (nama > 5 huruf):</b><br>";
print_r($filtered);
echo "<br><br>";

// 3. 6. 6. Implementasi berbagai fungsi sorting pada array
$number = array(1, 5, 4, 2, 3);

sort($number); // Sorting Ascending
echo "<b>sort() - Ascending:</b><br>";
print_r($number);
echo "<br>";

rsort($number); // Sorting Descending
echo "<b>rsort() - Descending:</b><br>";
print_r($number);
echo "<br>";

?>
