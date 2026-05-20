<?php
// Get flash message if exists
$flash = isset($flash) ? $flash : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Risk Management COBIT 2019</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        body {
            /* background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%); */
            background-image: url('/public/assets/img/background.jpeg');
            background-size:cover;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            /* animation: gradientShift 15s ease infinite; */
            /* background-size: 200% 200%; */
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            animation: slideUp 0.6s ease;
            margin-top: 200px;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
            padding: 40px 30px;
            backdrop-filter: blur(10px);
        }

        .login-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .login-header .icon-wrapper {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            color: white;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .login-header h1 {
            color: #2c3e50;
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .login-header p {
            color: #95a5a6;
            font-size: 14px;
            margin: 0;
            font-weight: 500;
        }

        .alert {
            border-radius: 10px;
            border: none;
            margin-bottom: 24px;
            padding: 14px 16px;
            animation: slideDown 0.4s ease;
            font-size: 14px;
            font-weight: 500;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-danger {
            background-color: #fff5f5;
            color: #c0392b;
            border-left: 4px solid #e74c3c;
        }

        .alert-success {
            background-color: #f0fdf4;
            color: #27ae60;
            border-left: 4px solid #2ecc71;
        }

        .alert-close {
            color: currentColor;
            opacity: 0.5;
            transition: opacity 0.2s;
        }

        .alert-close:hover {
            opacity: 1;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .form-label i {
            color: #ff6b9d;
            width: 16px;
            text-align: center;
        }

        .input-wrapper {
            position: relative;
        }

        .form-control {
            border: 2px solid #ecf0f1;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f8f9fa;
            color: #2c3e50;
        }

        .form-control::placeholder {
            color: #bdc3c7;
        }

        .form-control:hover {
            border-color: #d5dbdb;
            background: #ffffff;
        }

        .form-control:focus {
            border-color: #ff6b9d;
            background: white;
            box-shadow: 0 0 0 4px rgba(255, 107, 157, 0.1);
            outline: none;
        }

        .form-control.is-invalid {
            border-color: #e74c3c;
        }

        .btn-login {
            width: 100%;
            padding: 13px 16px;
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease;
            z-index: 0;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 107, 157, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
            box-shadow: 0 5px 15px rgba(255, 107, 157, 0.3);
        }

        .btn-login span {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-login:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .demo-info {
            background: linear-gradient(135deg, #f5f7ff 0%, #f0f4ff 100%);
            border-left: 4px solid #ff6b9d;
            padding: 20px;
            border-radius: 10px;
            margin-top: 28px;
            font-size: 13px;
            animation: slideUp 0.8s ease 0.2s both;
        }

        .demo-info h6 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .demo-info i {
            color: #ff6b9d;
        }

        .credentials-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 12px;
        }

        .credential-item {
            background: white;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #e8eaed;
            transition: all 0.3s ease;
        }

        .credential-item:hover {
            box-shadow: 0 4px 12px rgba(255, 107, 157, 0.15);
            border-color: #ff6b9d;
        }

        .credential-label {
            font-weight: 600;
            color: #2c3e50;
            font-size: 12px;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .credential-item p {
            margin: 4px 0;
            color: #555;
            font-size: 13px;
        }

        .credential-item code {
            background: #f8f9fa;
            padding: 3px 8px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            color: #ff6b9d;
            font-weight: 600;
        }

        .form-divider {
            text-align: center;
            margin: 24px 0;
            position: relative;
        }

        .form-divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #ecf0f1;
        }

        .form-divider span {
            background: white;
            padding: 0 12px;
            color: #95a5a6;
            font-size: 13px;
            position: relative;
            display: inline-block;
        }

        /* Mobile responsive */
        @media (max-width: 480px) {
            .login-card {
                padding: 30px 20px;
            }

            .login-header h1 {
                font-size: 24px;
            }

            .login-header .icon-wrapper {
                width: 60px;
                height: 60px;
                font-size: 30px;
            }

            .credentials-row {
                grid-template-columns: 1fr;
            }

            .btn-login {
                padding: 11px 14px;
                font-size: 14px;
            }

            .form-control {
                padding: 11px 14px;
                font-size: 14px;
            }

            .demo-info {
                padding: 16px;
                font-size: 12px;
            }

            .login-container {
                margin-top: 40px;
            }
        }

        @media (max-width: 360px) {
            .login-container {
                max-width: 100%;
            }

            .login-card {
                padding: 24px 16px;
                border-radius: 12px;
            }

            .login-header {
                margin-bottom: 28px;
            }

            .login-header h1 {
                font-size: 22px;
            }

            .form-label {
                font-size: 13px;
            }

            .form-control {
                font-size: 13px;
                padding: 10px 12px;
            }

            .btn-login {
                padding: 10px 12px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="icon-wrapper">
                    <!-- <i class="fas fa-shield-alt"></i> -->
                     <img src="/public/assets/img/logo.jpeg" alt="Logo RM Jingkrak TOB" style="height: 100px; border-radius: 50%; object-fit: cover;">
                </div>
                <h1>Risk Management</h1>
                <p>COBIT 2019 - Ayam Jingkrak TOB</p>
            </div>

            <?php if ($flash): ?>
                <div class="alert alert-<?php echo $flash['type'] === 'danger' ? 'danger' : 'success'; ?> alert-dismissible fade show" role="alert">
                    <i class="fas fa-<?php echo $flash['type'] === 'danger' ? 'exclamation-circle' : 'check-circle'; ?>"></i>
                    <span><?php echo $flash['message']; ?></span>
                    <button type="button" class="btn-close alert-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form method="POST" action="index.php?page=login&action=process" id="loginForm" novalidate>
                <div class="form-group">
                    <label class="form-label" for="username">
                        <i class="fas fa-user"></i> Username
                    </label>
                    <div class="input-wrapper">
                        <input 
                            type="text" 
                            class="form-control" 
                            id="username"
                            name="username" 
                            placeholder="Masukkan username"
                            required
                            autocomplete="username"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <div class="input-wrapper">
                        <input 
                            type="password" 
                            class="form-control" 
                            id="password"
                            name="password" 
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password"
                        >
                    </div>
                </div>

                <button type="submit" class="btn-login" id="submitBtn">
                    <span>
                        <i class="fas fa-sign-in-alt"></i> Login
                    </span>
                </button>
            </form>

            <div class="demo-info">
                <h6><i class="fas fa-info-circle"></i> Demo Credentials</h6>
                <div class="credentials-row">
                    <div class="credential-item">
                        <div class="credential-label">Admin</div>
                        <p><strong>User:</strong> <code>admin</code></p>
                        <p><strong>Pass:</strong> <code>admin123</code></p>
                    </div>
                    <div class="credential-item">
                        <div class="credential-label">Kasir</div>
                        <p><strong>User:</strong> <code>kasir</code></p>
                        <p><strong>Pass:</strong> <code>kasir123</code></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form validation visual feedback
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span><i class="fas fa-spinner fa-spin"></i> Sedang Login...</span>';
        });

        // Input focus animation
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.closest('.form-group').style.transform = 'scale(1.02)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.closest('.form-group').style.transform = 'scale(1)';
            });
        });

        // Prevent multiple form submissions
        inputs.forEach(input => {
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    document.getElementById('loginForm').submit();
                }
            });
        });
    </script>
</body>
</html>