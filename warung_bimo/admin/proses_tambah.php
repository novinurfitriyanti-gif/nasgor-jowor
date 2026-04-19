<?php
include '../config/db.php';

// Ambil data dari form
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
$harga = mysqli_real_escape_string($conn, $_POST['harga']);

// Kita HAPUS variabel $link_wa di sini karena sudah dibuat otomatis di halaman depan

// Logika Upload Foto
$nama_file = $_FILES['foto_upload']['name'];
$ukuran_file = $_FILES['foto_upload']['size'];
$tmp_name = $_FILES['foto_upload']['tmp_name'];

// Tentukan lokasi penyimpanan
$target_dir = "../assets/";
$target_file = $target_dir . basename($nama_file);

// Pindahkan file ke folder assets
if (move_uploaded_file($tmp_name, $target_file)) {
    // Simpan data ke database (Tanpa kolom link_wa agar tidak error)
    $query = "INSERT INTO menu (nama, deskripsi, harga, foto) 
              VALUES ('$nama', '$deskripsi', '$harga', '$nama_file')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Menu baru berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "Gagal simpan ke database: " . mysqli_error($conn);
    }
} else {
    echo "Gagal upload gambar ke folder assets. Pastikan folder tersebut ada dan bisa diakses.";
}