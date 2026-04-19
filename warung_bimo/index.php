<?php
include 'config/db.php';

// Ambil Data Banner & Kontak dari db_nasgor
$data_banner = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM banner LIMIT 1"));
$gambar_banner = $data_banner['gambar'] ?? 'banner_mas_bimo.png';
$data_k = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kontak LIMIT 1"));
$wa_clean = str_replace(['-', ' ', '+'], '', $data_k['whatsapp'] ?? '6288210921344');
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasgor Jowor Mas Bimo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    :root {
        --hijau: #1a432e;
        --kuning: #ffc107;
        --wa: #25d366;
    }

    body {
        background-color: #fcfbf4;
        font-family: 'Plus Jakarta Sans', sans-serif;
        overflow-x: hidden;
    }

    .navbar {
        background: var(--hijau) !important;
        border-bottom: 3px solid var(--kuning);
    }

    .nav-link {
        font-weight: 700;
        font-size: 0.85rem;
        color: white !important;
    }

    /* Banner Luas & Responsif */
    .banner-wrap {
        width: 100%;
        height: auto;
        max-height: 450px;
        overflow: hidden;
        background: #eee;
    }

    .banner-wrap img {
        width: 100%;
        height: auto;
        display: block;
        object-fit: contain;
    }

    /* Menu Card */
    .menu-card {
        background: white;
        border-radius: 15px;
        border: 1px solid #eee;
        transition: 0.3s;
    }

    .img-menu {
        width: 85px;
        height: 85px;
        border-radius: 12px;
        object-fit: cover;
    }

    /* Box GoFood di Bawah Menu */
    .gofood-box {
        background: #fff3cd;
        border: 2px dashed #856404;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        margin-top: 20px;
    }

    /* Review Horizontal */
    .review-scroll {
        display: flex;
        overflow-x: auto;
        gap: 15px;
        padding: 10px 0;
        scrollbar-width: none;
    }

    .review-scroll::-webkit-scrollbar {
        display: none;
    }

    .review-item {
        min-width: 280px;
        background: white;
        padding: 20px;
        border-radius: 15px;
        border-left: 5px solid var(--kuning);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    /* UI Melayang */
    #cart-btn {
        position: fixed;
        bottom: 100px;
        right: 25px;
        z-index: 99;
        border-radius: 50px;
        display: none;
    }

    .wa-float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 30px;
        right: 25px;
        background: var(--wa);
        color: white;
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        z-index: 100;
        text-decoration: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    h4 {
        font-weight: 800;
        color: var(--hijau);
        margin-bottom: 25px;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">NASGOR <span style="color:var(--kuning)">JOWOR</span></a>
            <div class="ms-auto d-flex gap-3">
                <a href="#menu-area" class="nav-link">MENU</a>
                <a href="tentang.php" class="nav-link">TENTANG</a>
                <a href="kontak.php" class="nav-link">KONTAK</a>
            </div>
        </div>
    </nav>

    <div class="banner-wrap">
        <img src="assets/<?php echo $gambar_banner; ?>" alt="Banner Nasgor Jowor">
    </div>

    <div class="container py-5" id="menu-area">
        <div class="row g-5">
            <div class="col-lg-7">
                <h4>Menu Favorit</h4>
                <?php
                $q = mysqli_query($conn, "SELECT * FROM menu");
                while ($row = mysqli_fetch_assoc($q)) { ?>
                <div class="menu-card p-3 mb-3 shadow-sm">
                    <div class="d-flex align-items-center">
                        <img src="assets/<?php echo $row['foto']; ?>" class="img-menu">
                        <div class="ms-3 flex-grow-1">
                            <h6 class="fw-bold mb-1"><?php echo $row['nama']; ?></h6>
                            <div class="d-flex gap-2 mb-2">
                                <select id="lvl-<?php echo $row['id']; ?>" class="form-select form-select-sm"
                                    style="width: 100px;">
                                    <option value="Gak Pede">Gak Pede</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Pedes">Pedes</option>
                                </select>
                                <input type="number" id="qty-<?php echo $row['id']; ?>" value="1" min="1"
                                    class="form-control form-control-sm" style="width: 55px;">
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-success fw-bold">Rp
                                    <?php echo number_format($row['harga'],0,',','.'); ?></span>
                                <button
                                    onclick="tambahKeKeranjang(<?php echo $row['id']; ?>, '<?php echo $row['nama']; ?>', <?php echo $row['harga']; ?>)"
                                    class="btn btn-dark btn-sm rounded-pill px-3">
                                    + Keranjang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="gofood-box shadow-sm">
                    <h5 class="fw-bold mb-2">Mau order tanpa ribet?</h5>
                    <p class="small mb-3">Langsung lewat GoFood aja!</p>
                    <a href="https://gofood.link/a/NeRGfTE" target="_blank"
                        class="btn btn-danger rounded-pill px-5 fw-bold shadow">
                        <i class="fas fa-motorcycle me-2"></i> ORDER VIA GOFOOD
                    </a>
                </div>
            </div>

            <div class="col-lg-5">
                <h4>Menu Lengkap</h4>
                <img src="assets/menu_lengkap.png" class="img-fluid rounded-4 shadow-sm w-100">
            </div>
        </div>

        <div class="row mt-5 pt-5 border-top g-4">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Apa Kata Mereka?</h4>
                    <small class="text-muted">Geser <i class="fas fa-arrow-right"></i></small>
                </div>
                <div class="review-scroll">
                    <?php
                    $q_rev = mysqli_query($conn, "SELECT * FROM reviews ORDER BY id DESC");
                    while ($rev = mysqli_fetch_assoc($q_rev)) { ?>
                    <div class="review-item shadow-sm">
                        <div class="text-warning mb-2" style="font-size: 12px;">
                            <?php for($i=1; $i<=$rev['rating']; $i++) echo '★'; ?>
                        </div>
                        <p class="small mb-2">"<?php echo $rev['komentar']; ?>"</p>
                        <div class="fw-bold small text-dark">— <?php echo $rev['nama']; ?></div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="p-4 bg-white rounded-4 shadow-sm border border-warning">
                    <h6 class="fw-bold mb-3">Tulis Review</h6>
                    <form action="proses_saran.php" method="POST">
                        <input type="text" name="nama" class="form-control form-control-sm mb-2" placeholder="Nama"
                            required>
                        <select name="rating" class="form-select form-select-sm mb-2">
                            <option value="5">Bintang 5 ★★★★★</option>
                            <option value="4">Bintang 4 ★★★★</option>
                            <option value="3">Bintang 3 ★★★</option>
                            <option value="2">Bintang 2 ★★</option>
                            <option value="1">Bintang 1 ★</option>
                        </select>
                        <textarea name="pesan" class="form-control form-control-sm mb-3" rows="2"
                            placeholder="Gimana rasanya?" required></textarea>
                        <button type="submit" class="btn btn-success btn-sm w-100 fw-bold rounded-pill shadow-sm">Kirim
                            Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <button id="cart-btn" class="btn btn-warning fw-bold shadow-lg px-4 py-2" onclick="kirimKeWA()">
        <i class="fas fa-shopping-basket me-2"></i> PESAN (<span id="count">0</span>)
    </button>

    <a href="https://wa.me/<?php echo $wa_clean; ?>" class="wa-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
    let keranjang = [];

    function tambahKeKeranjang(id, nama, harga) {
        const lvl = document.getElementById('lvl-' + id).value;
        const qty = parseInt(document.getElementById('qty-' + id).value);
        keranjang.push({
            nama,
            lvl,
            qty,
            total: harga * qty
        });
        document.getElementById('cart-btn').style.display = 'block';
        document.getElementById('count').innerText = keranjang.length;
    }

    function kirimKeWA() {
        let pesan = "Halo Mas Bimo, mau pesan:\n\n";
        let grandTotal = 0;
        keranjang.forEach((item, i) => {
            pesan += `${i+1}. *${item.nama}* (${item.lvl})\n   Jumlah: ${item.qty} porsi\n\n`;
            grandTotal += item.total;
        });
        pesan += `*Total Pembayaran: Rp ${grandTotal.toLocaleString('id-ID')}*`;
        window.open(`https://wa.me/<?php echo $wa_clean; ?>?text=${encodeURIComponent(pesan)}`, '_blank');
        keranjang = [];
        document.getElementById('cart-btn').style.display = 'none';
    }
    </script>
</body>

</html>