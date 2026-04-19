<?php
include 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);

    $query = "INSERT INTO saran (nama, pesan) VALUES ('$nama', '$pesan')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Terima kasih! Kritik dan saran Anda telah kami terima.');
                window.location='index.php';
              </script>";
    } else {
        echo "Gagal: " . mysqli_error($conn);
    }
}