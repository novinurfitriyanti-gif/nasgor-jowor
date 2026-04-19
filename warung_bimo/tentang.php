<?php
include 'config/db.php';

// Ambil Data Kontak untuk footer/link WA
$query_k = mysqli_query($conn, "SELECT * FROM kontak LIMIT 1");
$data_k = mysqli_fetch_assoc($query_k);
$wa_clean = str_replace(['-', ' ', '+'], '', $data_k['whatsapp'] ?? '6288210921344');

// Link Iframe Maps (Fokus Parung)
$map_parung = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15858.468453473488!2d106.71617475!3d-6.4431522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e5d5743f3f75%3A0x2bace6f897117175!2sParung%2C%20Kec.%20Parung%2C%20Kabupaten%20Bogor%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1713532000000!5m2!1sid!2sid";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Nasgor Jowor Mas Bimo</title>
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

    /* Header Style */
    .header-about {
        background: linear-gradient(rgba(26, 67, 46, 0.85), rgba(26, 67, 46, 0.85)), url('assets/banner_mas_bimo.png');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 120px 0;
        text-align: center;
    }

    /* Card Story */
    .story-container {
        background: white;
        border-radius: 30px;
        padding: 50px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
        margin-top: -60px;
        position: relative;
        z-index: 5;
    }

    .icon-circle {
        width: 70px;
        height: 70px;
        background: #fff3cd;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: #856404;
        margin-bottom: 25px;
    }

    /* Feature Cards */
    .feature-card {
        border: none;
        border-radius: 20px;
        transition: 0.4s;
        height: 100%;
        background: #fffdf5;
        border-bottom: 5px solid var(--kuning);
    }

    .feature-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
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
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    h2,
    h3 {
        font-weight: 800;
        color: var(--hijau);
    }

    .text-justify {
        text-align: justify;
        line-height: 1.8;
    }

    .map-frame {
        border-radius: 25px;
        overflow: hidden;
        border: 1px solid #eee;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">NASGOR JOWOR</a>
            <div class="ms-auto d-flex gap-3">
                <a href="index.php" class="nav-link">HOME</a>
                <a href="tentang.php" class="nav-link text-warning">TENTANG</a>
                <a href="kontak.php" class="nav-link">KONTAK</a>
            </div>
        </div>
    </nav>

    <header class="header-about">
        <div class="container">
            <h1 class="display-4 fw-800">Cita Rasa Otentik Parung</h1>
            <p class="lead opacity-75">Lebih dari sekadar nasi goreng, ini adalah dedikasi untuk rasa.</p>
        </div>
    </header>

    <section class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="story-container">
                    <div class="row align-items-center g-5">
                        <div class="col-md-5 text-center">
                            <img src="assets/menu_lengkap.png" class="img-fluid rounded-4 shadow-lg"
                                alt="Menu Nasgor Jowor">
                        </div>
                        <div class="col-md-7">
                            <div class="icon-circle shadow-sm"><i class="fas fa-history"></i></div>
                            <h3>Cerita Kami</h3>
                            <p class="text-muted text-justify">
                                Nasgor Jowor Mas Bimo hadir untuk menjawab kerinduan warga Parung akan hidangan nasi
                                goreng dengan bumbu rempah yang berani. Kami tidak menggunakan bumbu instan, melainkan
                                racikan manual yang dipersiapkan setiap hari demi menjaga kesegaran rasa.
                            </p>
                            <p class="text-muted text-justify">
                                Berlokasi di jantung area Parung, kami berkomitmen menjadi destinasi kuliner malam
                                favorit Anda. Teknik memasak dengan api besar (Wok Hei) memberikan aroma asap yang khas,
                                membuat setiap piring yang kami sajikan memiliki jiwa dan rasa yang berbeda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="text-center mb-5">
            <h2 class="mb-3">Kenapa Memilih Kami?</h2>
            <div class="mx-auto" style="width: 60px; height: 5px; background: var(--kuning); border-radius: 5px;"></div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card p-4 text-center">
                    <div class="text-warning mb-3 display-5"><i class="fas fa-seedling"></i></div>
                    <h5 class="fw-bold">Bahan Segar</h5>
                    <p class="small text-muted">Kami menggunakan bahan baku terbaik dari pasar lokal Parung untuk
                        menjamin kualitas setiap suapan.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card p-4 text-center">
                    <div class="text-warning mb-3 display-5"><i class="fas fa-fire-alt"></i></div>
                    <h5 class="fw-bold">Masakan Fresh</h5>
                    <p class="small text-muted">Setiap pesanan dimasak secara mendadak saat Anda memesan, menjamin
                        hidangan sampai di meja dalam keadaan hangat.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card p-4 text-center">
                    <div class="text-warning mb-3 display-5"><i class="fas fa-wallet"></i></div>
                    <h5 class="fw-bold">Harga Terjangkau</h5>
                    <p class="small text-muted">Rasa bintang lima dengan harga kaki lima. Kepuasan perut Anda adalah
                        prioritas utama kami.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-5 mt-5">
        <div class="container text-center">
            <h2 class="mb-4">Kunjungi Kami di Parung</h2>
            <p class="mb-5 text-muted">
                <i class="fas fa-map-marker-alt me-2 text-danger"></i>
                Jl. Raya Parung, Kecamatan Parung, Kabupaten Bogor
            </p>
            <div class="map-frame">
                <iframe src="<?php echo $map_parung; ?>" width="100%" height="400" style="border:0;" allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-5">
        <div class="container text-center">
            <h4 class="text-white mb-3">NASGOR JOWOR</h4>
            <p class="small opacity-50 mb-0">Nikmat Jowor-nya, Mantap Rasanya.</p>
            <hr class="my-4 opacity-25" style="max-width: 300px; margin: auto;">
            <p class="small mb-0 opacity-25">© 2026 Nasgor Jowor Mas Bimo - Parung. All Rights Reserved.</p>
        </div>
    </footer>

    <a href="https://wa.me/<?php echo $wa_clean; ?>" class="wa-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>