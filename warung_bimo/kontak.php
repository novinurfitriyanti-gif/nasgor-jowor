<?php
include 'config/db.php';

// Ambil data kontak terbaru dari database db_nasgor
$query_k = mysqli_query($conn, "SELECT * FROM kontak LIMIT 1");
$data_k = mysqli_fetch_assoc($query_k);

// Variabel database
$alamat = $data_k['alamat'] ?? 'Kp. Jl. Raya Lengkong Barang, Iwul, Kec. Parung';
$whatsapp = $data_k['whatsapp'] ?? '0882-1092-1344';
$jam_buka = $data_k['jam_buka'] ?? '18.00 - 23.45 WIB (Kamis Tutup)';

// Bersihkan nomor WA untuk link tombol chat
$wa_link = str_replace(['-', ' ', '+'], '', $whatsapp);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - Nasgor Jowor</title>

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
        color: #333;
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

    h2,
    h4,
    h5 {
        font-weight: 800;
        color: var(--hijau);
    }

    .info-card {
        background: white;
        border-radius: 20px;
        border: 1px solid #eee;
        transition: 0.3s;
    }

    .icon-circle {
        width: 50px;
        height: 50px;
        background: #f0fdf4;
        color: var(--hijau);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .saran-box {
        background: white;
        border: 2px dashed #d1b894;
        border-radius: 25px;
        padding: 40px;
    }

    .map-frame {
        border-radius: 25px;
        overflow: hidden;
        border: 1px solid #eee;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .btn-wa-full {
        background: var(--wa);
        color: white;
        border-radius: 15px;
        font-weight: 700;
        padding: 15px;
        text-decoration: none;
        display: block;
        text-align: center;
        transition: 0.3s;
    }

    .btn-wa-full:hover {
        background: #1eb954;
        color: white;
        transform: translateY(-3px);
    }

    .btn-kirim {
        background: var(--hijau);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 700;
        padding: 12px;
        transition: 0.3s;
    }

    .accordion-item {
        border: none;
        margin-bottom: 10px;
        border-radius: 15px !important;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
    }

    .accordion-button:not(.collapsed) {
        background-color: #f0fdf4;
        color: var(--hijau);
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">NASGOR JOWOR</a>
            <div class="ms-auto d-flex gap-3">
                <a href="index.php" class="nav-link">HOME</a>
                <a href="tentang.php" class="nav-link">TENTANG</a>
                <a href="kontak.php" class="nav-link text-warning">KONTAK</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h2>Kontak & Pemesanan</h2>
            <p class="text-muted">Mau ambil sendiri atau dianter ke depan pintu? Kita siap!</p>
        </div>

        <div class="row g-5">
            <div class="col-lg-6">
                <div class="map-frame mb-4" style="height: 380px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.887227571003!2d106.702958!3d-6.4085442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e96231031e8f%3A0xe008acb2a4a43746!2sNasi%20goreng%20jowor!5e0!3m2!1sid!2sid!4v1713530000000!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="info-card p-3 shadow-sm h-100">
                            <div class="icon-circle mb-3"><i class="fas fa-phone-alt"></i></div>
                            <h6 class="fw-bold mb-1">WhatsApp</h6>
                            <p class="text-muted small mb-0"><?php echo $whatsapp; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-card p-3 shadow-sm h-100">
                            <div class="icon-circle mb-3"><i class="fas fa-clock"></i></div>
                            <h6 class="fw-bold mb-1">Jam Operasional</h6>
                            <p class="text-muted small mb-0"><?php echo $jam_buka; ?></p>
                        </div>
                    </div>
                </div>

                <h4 class="mt-5 mb-3">Tanya Jawab Pesanan</h4>
                <div class="accordion" id="faqNasgor">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#q1">
                                Bisa dianter ke rumah? Ada ongkirnya?
                            </button>
                        </h2>
                        <div id="q1" class="accordion-collapse collapse show" data-bs-parent="#faqNasgor">
                            <div class="accordion-body text-muted small">
                                Bisa banget buat area sekitar Iwul & Parung! Untuk ongkir disesuaikan sama jaraknya ya,
                                tenang aja tetep bersahabat kok.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#q2">
                                Boleh pesen dulu terus ambil sendiri (Self-Pickup)?
                            </button>
                        </h2>
                        <div id="q2" class="accordion-collapse collapse" data-bs-parent="#faqNasgor">
                            <div class="accordion-body text-muted small">
                                Boleh banget! Biar nggak capek nunggu di warung, lo bisa WA dulu, nanti kita kabarin pas
                                udah mau mateng. Tinggal ambil deh!
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="saran-box shadow-sm mb-4">
                    <h5 class="mb-4">Kritik & Saran</h5>
                    <p class="small text-muted mb-4">Ada keluhan soal pengantaran atau rasa? Kasih tau Mas Bimo langsung
                        di bawah ini.</p>

                    <form action="proses_saran.php" method="POST">
                        <div class="mb-3">
                            <label class="small fw-bold mb-2">Nama</label>
                            <input type="text" name="nama" class="form-control border-0 bg-light"
                                placeholder="Nama lengkap lo" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold mb-2">Saran / Keluhan</label>
                            <textarea name="pesan" class="form-control border-0 bg-light" rows="5"
                                placeholder="Tulis masukan lo di sini..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-kirim w-100 mt-2">Kirim Masukan</button>
                    </form>
                </div>

                <div class="info-card p-4">
                    <h6 class="fw-bold mb-3">Mau Pesan Sekarang?</h6>
                    <a href="https://wa.me/<?php echo $wa_link; ?>" class="btn-wa-full">
                        <i class="fab fa-whatsapp me-2"></i> Chat WhatsApp Mas Bimo
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white py-4 text-center mt-5">
        <div class="container">
            <p class="small mb-0 opacity-50">© 2026 Nasgor Jowor Mas Bimo - Iwul, Parung</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>