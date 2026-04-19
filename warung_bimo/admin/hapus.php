<?php
include '../config/db.php';

$id = $_GET['id'];

$ambil_foto = mysqli_query($conn, "SELECT foto FROM menu WHERE id='$id'");
$data = mysqli_fetch_assoc($ambil_foto);
$foto_lama = $data['foto'];

if (file_exists("../assets/$foto_lama")) {
    unlink("../assets/$foto_lama");
}

$query = mysqli_query($conn, "DELETE FROM menu WHERE id='$id'");

header("Location: index.php");