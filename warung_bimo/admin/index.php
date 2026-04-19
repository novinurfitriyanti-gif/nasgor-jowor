<?php
session_start();
// Jika belum login, tendang balik ke halaman login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include '../config/db.php';

// Ambil data banner saat ini
$query_banner = mysqli_query($conn, "SELECT * FROM banner LIMIT 1");
$data_banner = mysqli_fetch_assoc($query_banner);

// Ambil data menu lengkap saat ini
$query_lengkap = mysqli_query($conn, "SELECT * FROM menu_lengkap LIMIT 1");
$data_lengkap = mysqli_fetch_assoc($query_lengkap);

// Ambil data kontak untuk form edit
$q_kontak = mysqli_query($conn, "SELECT * FROM kontak LIMIT 1");
$d_k_admin = mysqli_fetch_assoc($q_kontak);

// Hitung jumlah kritik & saran yang masuk
$q_saran = mysqli_query($conn, "SELECT COUNT(*) as total FROM saran");
$d_saran = mysqli_fetch_assoc($q_saran);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <title>Admin Panel - Warung Mas Bimo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    .preview-img {
        max-width: 300px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-stats {
        transition: 0.3s;
        border: none;
    }

    .card-stats:hover {
        transform: translateY(-5px);
    }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5 mb-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0 fw-bold text-success">Dashboard Admin</h1>
            <a href="logout.php" class="btn btn-danger btn-sm shadow-sm"
                onclick="return confirm('Yakin ingin keluar?')">
                <i class="fas fa-sign-out-alt"></i> Keluar (Logout)
            </a>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 mb-2">
                <a href="../index.php" class="btn btn-outline-secondary w-100 py-2" target="_blank">
                    <i class="fas fa-external-link-alt"></i> Lihat Tampilan Pembeli
                </a>
            </div>
            <div class="col-md-6 mb-2">
                <a href="data_saran.php" class="btn btn-warning w-100 py-2 fw-bold text-dark">
                    <i class="fas fa-comments"></i> Lihat Kritik & Saran (<?php echo $d_saran['total']; ?>)
                </a>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">
                <div class="card card-stats bg-white shadow-sm">
                    <div class="card-body d-flex align-items-center justify-content-between p-4">
                        <div>
                            <h6 class="text-muted mb-1">Total Masukan Pelanggan</h6>
                            <h2 class="fw-bold mb-0 text-success"><?php echo $d_saran['total']; ?> Pesan</h2>
                        </div>
                        <i class="fas fa-comment-dots fa-3x text-light"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Kelola Banner Utama</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="../assets/<?php echo $data_banner['gambar']; ?>" class="img-fluid preview-img mb-3"
                            alt="Banner">
                        <form action="proses_edit_banner.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="banner_baru" class="form-control mb-2" accept="image/*" required>
                            <button type="submit" class="btn btn-success w-100">Update Banner</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Kelola Menu Lengkap (Brosur)</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="../assets/<?php echo $data_lengkap['gambar']; ?>" class="img-fluid preview-img mb-3"
                            alt="Menu Lengkap">
                        <form action="proses_edit_lengkap.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="menu_lengkap_baru" class="form-control mb-2" accept="image/*"
                                required>
                            <button type="submit" class="btn btn-dark w-100">Update Menu Lengkap</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-5 border-0 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Update Info Kontak & Jam Buka</h5>
            </div>
            <div class="card-body">
                <form action="proses_edit_kontak.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control" rows="2"
                            required><?php echo $d_k_admin['alamat']; ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">WhatsApp</label>
                            <input type="text" name="whatsapp" class="form-control"
                                value="<?php echo $d_k_admin['whatsapp']; ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Jam Buka</label>
                            <input type="text" name="jam_buka" class="form-control"
                                value="<?php echo $d_k_admin['jam_buka']; ?>" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan Kontak</button>
                </form>
            </div>
        </div>

        <hr class="my-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Daftar Menu Favorit</h2>
            <a href="tambah.php" class="btn btn-primary px-4 shadow-sm"> + Tambah Menu Baru</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered bg-white shadow-sm text-center">
                <thead class="table-dark">
                    <tr>
                        <th width="120">Foto</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM menu");
                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr class="align-middle text-start">
                        <td class="text-center">
                            <img src="../assets/<?php echo $row['foto']; ?>" class="rounded" width="80" height="80"
                                style="object-fit: cover;">
                        </td>
                        <td class="fw-bold"><?php echo $row['nama']; ?></td>
                        <td class="text-success fw-bold">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                        </td>
                        <td class="text-center">
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin mau hapus menu ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center text-muted py-4'>Belum ada menu. Silakan klik Tambah Menu Baru.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>