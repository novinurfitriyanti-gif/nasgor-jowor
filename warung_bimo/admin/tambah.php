<?php include '../config/db.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h4>Tambah Menu Baru</h4>
                <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Nama Menu</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Pilih Foto Makanan</label>
                        <input type="file" name="foto_upload" class="form-control" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label>Link WhatsApp</label>
                        <input type="text" name="link_wa" class="form-control" placeholder="https://wa.me/..." required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Simpan Menu</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>