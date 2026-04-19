<?php
session_start();
include '../config/db.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        // Cek kecocokan password
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['user'] = $row['username'];
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Admin - Nasgor Jowor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #1a432e;
        height: 100vh;
        display: flex;
        align-items: center;
        font-family: 'Poppins', sans-serif;
    }

    .card {
        border-radius: 20px;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .btn-success {
        background-color: #1a432e;
        border: none;
        border-radius: 10px;
    }

    .btn-success:hover {
        background-color: #123121;
    }

    .form-control {
        border-radius: 10px;
        background: #f8f9fa;
        border: none;
        padding: 12px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card p-4">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold mb-0">ADMIN <span class="text-warning">JOWOR</span></h4>
                        <p class="text-muted small">Silakan login untuk kelola warung</p>
                    </div>

                    <?php if (isset($error)) : ?>
                    <div class="alert alert-danger text-center py-2 small">Username atau Password salah!</div>
                    <?php endif; ?>

                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username..."
                                required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Kata Sandi</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Masukkan kata sandi..." required>
                        </div>
                        <button type="submit" name="login" class="btn btn-success w-100 py-3 fw-bold shadow">MASUK
                            SEKARANG</button>
                    </form>
                </div>
                <div class="text-center mt-3">
                    <a href="../index.php" class="text-white-50 text-decoration-none small"><i
                            class="fas fa-arrow-left"></i> Kembali ke Website</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>