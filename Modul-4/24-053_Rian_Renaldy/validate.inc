<?php
function validateName($field_list, $field_name, &$errors) {
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) == '') {
        $errors[$field_name] = "Field $field_name tidak boleh kosong.";
        return false;
    } elseif (!preg_match("/^[a-zA-Z'-]+$/", $field_list[$field_name])) {
        $errors[$field_name] = "Field $field_name hanya boleh berisi huruf.";
        return false;
    }

    return true;
}

function validateEmail($field_list, $field_email, &$errors) {
    if (!isset($field_list[$field_email]) || trim($field_list[$field_email]) == '') {
        $errors[$field_email] = "Field $field_email tidak boleh kosong.";
        return false;
    } elseif (!filter_var($field_list[$field_email], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_email] = "Format email tidak valid.";
        return false;
    }

    return true;
}

function validateBirthdate($field_list, $field_birthdate, &$errors) {
    if (!isset($field_list[$field_birthdate]) || trim($field_list[$field_birthdate]) == '') {
        $errors[$field_birthdate] = "Field $field_birthdate tidak boleh kosong.";
        return false;
    }

    $parts = explode('-', trim($field_list[$field_birthdate]));

    if (count($parts) !== 3 || !checkdate((int)$parts[1], (int)$parts[0], (int)$parts[2])) {
        $errors[$field_birthdate] = "Format tanggal tidak valid atau tanggal tidak ada.";
        return false;
    }

    return true;
}
?>

