<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Inventaris Rokok</title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url(assets/img/gambar_dashboard.png);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
        }
        
        .card-login {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px); /* Efek blur halus di belakang card */
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }

        .login-header {
            background: #1a1a1a;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .input-group-text {
            background-color: transparent;
            border-right: none;
            color: #6c757d;
        }

        .form-control {
            border-left: none;
            padding: 12px;
            font-size: 15px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #dee2e6;
        }

        .btn-masuk {
            background-color: #1a1a1a;
            color: white;
            border-radius: 10px;
            font-weight: 600;
            padding: 12px;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-masuk:hover {
            background-color: #000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            color: #fff;
        }

        .show-password {
            cursor: pointer;
            border-left: none;
            background: transparent;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card card-login shadow-2xl">
                <div class="login-header">
                    <i class="bi bi-box-seam fs-1 mb-2"></i>
                    <h4 class="fw-bold m-0">GUDANG ROKOK</h4>
                    <small class="text-secondary">Inventory Management System</small>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    
                    <?php if(isset($_GET['pesan'])): ?>
                        <div class="alert alert-danger border-0 text-center py-2 mb-4" style="font-size: 13px; border-radius: 10px;">
                            <i class="bi bi-exclamation-circle me-2"></i>
                            <?php 
                                if($_GET['pesan'] == "gagal") echo "Username atau Password salah!";
                                if($_GET['pesan'] == "bukan_admin") echo "Akses Ditolak! Gunakan akun Admin.";
                                if($_GET['pesan'] == "logout") echo "Anda telah keluar dari sistem.";
                            ?>
                        </div>
                    <?php endif; ?>

                    <form action="auth/proses_login.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted text-uppercase">Username</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold text-muted text-uppercase">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password" id="passwordField" class="form-control" placeholder="******" required>
                                <span class="input-group-text show-password" onclick="togglePassword()">
                                    <i class="bi bi-eye" id="eyeIcon"></i>
                                </span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-masuk w-100 shadow">
                            Masuk Ke Dashboard <i class="bi bi-arrow-right-short"></i>
                        </button>
                    </form>
                </div>
                <div class="text-center pb-4">
                    <small class="text-muted">© 2026 Admin Inventaris v1.2</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script>
    function togglePassword() {
        const passwordField = document.getElementById('passwordField');
        const eyeIcon = document.getElementById('eyeIcon');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }
</script>

</body>
</html>