<?php
include '../config/db.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin - Daftar Saran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light p-4">
    <div class="container bg-white p-4 rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-success">Kritik & Saran Pelanggan</h4>
            <a href="index.php" class="btn btn-secondary btn-sm">Kembali</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Pesan Masukan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // Mengambil data dari tabel saran yang sudah dibuat sebelumnya
                    $query = mysqli_query($conn, "SELECT * FROM saran ORDER BY tanggal DESC");
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($row['tanggal'])); ?></td>
                            <td><strong><?php echo htmlspecialchars($row['nama']); ?></strong></td>
                            <td><?php echo nl2br(htmlspecialchars($row['pesan'])); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (mysqli_num_rows($query) == 0): ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada saran masuk.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>