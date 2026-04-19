<?php
session_start(); // Memulai sesi
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi

// Arahkan kembali ke halaman login setelah logout
header("Location: login.php");
exit;