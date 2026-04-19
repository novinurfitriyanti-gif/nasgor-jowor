<?php
include '../config/db.php';

// Ambil ID dari URL
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM menu WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

// Jika ID tidak ditemukan
if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Menu - Mas Bimo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto shadow-sm" style="max-width: 600px;">
            <div class="card-body">
                <h4 class="mb-4">Edit Menu: <?php echo $data['nama']; ?></h4>
                <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Nama Menu</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control"
                            rows="3"><?php echo $data['deskripsi']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" value="<?php echo $data['harga']; ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Saat Ini</label><br>
                        <img src="../assets/<?php echo $data['foto']; ?>" width="120" class="rounded mb-2">
                        <input type="file" name="foto_baru" class="form-control" accept="image/*">
                        <small class="text-muted">*Kosongkan jika tidak ingin ganti foto</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning w-100 fw-bold">Simpan Perubahan</button>
                        <a href="index.php" class="btn btn-secondary w-100">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>