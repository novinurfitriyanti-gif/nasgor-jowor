<?php
include '../config/db.php';

$username = 'ownerjowor';
$password = 'kecedarilahir';


$password_aman = password_hash($password, PASSWORD_DEFAULT);


mysqli_query($conn, "TRUNCATE TABLE users");
$query = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password_aman')");

if ($query) {
    echo "Akun Admin Berhasil Didaftarkan!<br>";
    echo "Username: <b>$username</b><br>";
    echo "Password: <b>$password</b><br><br>";
    echo "<a href='login.php'>Klik di sini untuk Login</a>";
} else {
    echo "Gagal daftar: " . mysqli_error($conn);
}