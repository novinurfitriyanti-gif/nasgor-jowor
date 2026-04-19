<?php
include '../config/db.php';

$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
$whatsapp = mysqli_real_escape_string($conn, $_POST['whatsapp']);
$jam_buka = mysqli_real_escape_string($conn, $_POST['jam_buka']);

$query = "UPDATE kontak SET alamat='$alamat', whatsapp='$whatsapp', jam_buka='$jam_buka' WHERE id=1";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Info kontak berhasil diupdate!'); window.location='index.php';</script>";
}