<?php
include '../config/db.php';

if (isset($_FILES['menu_lengkap_baru'])) {
    $nama_file = $_FILES['menu_lengkap_baru']['name'];
    $tmp_name = $_FILES['menu_lengkap_baru']['tmp_name'];
    $target_dir = "../assets/";
    $target_file = $target_dir . basename($nama_file);

    if (move_uploaded_file($tmp_name, $target_file)) {
        mysqli_query($conn, "UPDATE menu_lengkap SET gambar = '$nama_file' WHERE id = 1");
        echo "<script>alert('Menu Lengkap berhasil diupdate!'); window.location='index.php';</script>";
    } else {
        echo "Gagal upload gambar.";
    }
}