<?php

require 'validate.inc';
$errors = [];
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;


    if (trim($data['surname'] ?? '') === '' && trim($data['email'] ?? '') === '' && trim($data['birthdate'] ?? '') === '') {
        echo "<h3>Self-Submission Form</h3>";
        echo "<p style='color:red;'>Silakan isi form terlebih dahulu.</p>";
        include 'form.inc';
    } else {
        validateName($data, 'surname', $errors);
        validateEmail($data, 'email', $errors);
        validateBirthdate($data, 'birthdate', $errors);
        if (empty($errors)) {
            echo "<h3 style='color:green;'>Form submitted successfully with no errors!</h3>";
        } else {
            echo "<h3 style='color:red;'>Terdapat error pada form!</h3>";
            include 'form.inc';
        }
    }
} else {
    echo "<h3>Self-Submission Form</h3>";
    include 'form.inc';
}


?>

