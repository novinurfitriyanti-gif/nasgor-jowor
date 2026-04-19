<?php
include '../config/db.php';

if ($_FILES['banner_baru']['name']) {
    $nama_file = $_FILES['banner_baru']['name'];
    $tmp_name = $_FILES['banner_baru']['tmp_name'];
    $target_dir = "../assets/";
    $target_file = $target_dir . basename($nama_file);

    // Upload file ke assets
    if (move_uploaded_file($tmp_name, $target_file)) {
        $query = "UPDATE banner SET gambar = '$nama_file' WHERE id = 1";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Banner berhasil diupdate!'); window.location='index.php';</script>";
        } else {
            echo "Gagal update database: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal upload gambar banner.";
    }
}