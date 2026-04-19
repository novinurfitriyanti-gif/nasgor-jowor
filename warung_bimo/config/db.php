<?php
$conn = mysqli_connect("localhost", "root", "", "db_warung_bimo");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}