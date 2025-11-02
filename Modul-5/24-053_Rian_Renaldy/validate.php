<?php

function validateNama($nama, &$errors) {
    if (empty(trim($nama))){
        $errors['nama'] = "Nama tidak boleh kosong.";
        return false;
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $errors['nama'] = "Nama hanya boleh berisi huruf dan spasi.";
        return false;
    }
    return true;
}

function validateTelp($telp, &$errors) {
    if (empty(trim($telp))){
        $errors['telp'] = "Nomor telepon tidak boleh kosong.";        
        return false;
    } elseif (!preg_match("/^[0-9]+$/", $telp)) {
        $errors['telp'] = "Nomor telepon hanya boleh berisi angka.";
        return false;
    } elseif (strlen($telp) < 10 || strlen($telp) > 13){
        $errors['telp'] = 'Nomor telepon harus memiliik 10 sampai 13 digit';
        return false;
    } 
    return true;
}

function validateAlamat($alamat, &$errors) {
    if (empty(trim($alamat))){
        $errors['alamat'] = "Alamat tidak boleh kosong.";
        return false;
    } elseif (!preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9\s,.\-]+$/", $alamat)) {
        $errors['alamat'] = "Alamat harus mengandung huruf dan angka (alfanumerik).";
        return false;
    }
    return true;
}


?>