<?php
include '../config/db.php';

$id = $_POST['id'];
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
$harga = $_POST['harga'];

// Cek apakah ada upload foto baru
if ($_FILES['foto_baru']['name'] != "") {
    $nama_file = $_FILES['foto_baru']['name'];
    $tmp_name = $_FILES['foto_baru']['tmp_name'];
    $target_dir = "../assets/";

    // Hapus foto lama agar folder assets tidak penuh
    $ambil_lama = mysqli_query($conn, "SELECT foto FROM menu WHERE id='$id'");
    $data_lama = mysqli_fetch_assoc($ambil_lama);
    if (file_exists("../assets/" . $data_lama['foto'])) {
        unlink("../assets/" . $data_lama['foto']);
    }

    // Upload foto baru
    move_uploaded_file($tmp_name, $target_dir . $nama_file);

    // Update data dengan foto baru
    $query = "UPDATE menu SET nama='$nama', deskripsi='$deskripsi', harga='$harga', foto='$nama_file' WHERE id='$id'";
} else {
    // Update data tanpa ganti foto
    $query = "UPDATE menu SET nama='$nama', deskripsi='$deskripsi', harga='$harga' WHERE id='$id'";
}

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Menu berhasil diupdate!'); window.location='index.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}