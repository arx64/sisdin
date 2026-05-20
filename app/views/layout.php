<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title . ' - ' : ''; ?>Sistem Risk Management COBIT 2019</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --accent-color: #f093fb;
            --danger-color: #ff6b9d;
            --warning-color: #feca57;
            --success-color: #48dbfb;
            --info-color: #0abde3;
            --dark-color: #2c3e50;
            --light-bg: #f8f9ff;
            --card-shadow: 0 10px 30px rgba(102, 126, 234, 0.1);
            --border-radius: 16px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .wrapper {
            display: flex;
            flex: 1;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 300px;
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 0 0 40px rgba(0,0,0,0.3);
            backdrop-filter: blur(10px);
            z-index: 1000;
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.03"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.03"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.02"/><circle cx="10" cy="50" r="0.5" fill="white" opacity="0.02"/><circle cx="90" cy="30" r="0.5" fill="white" opacity="0.02"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }

        .sidebar-header {
            padding: 30px 25px 25px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .sidebar-header .logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .sidebar-header .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .sidebar-header h5 {
            margin: 0;
            font-weight: 700;
            font-size: 18px;
            color: white;
        }

        .sidebar-header p {
            margin: 5px 0 0;
            font-size: 13px;
            opacity: 0.8;
            color: rgba(255,255,255,0.8);
        }

        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .nav-item {
            margin: 8px 15px;
        }

        .nav-link {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            padding: 14px 20px;
            display: flex;
            align-items: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 12px;
            position: relative;
            overflow: hidden;
            font-weight: 500;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s;
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.2) 0%, rgba(118, 75, 162, 0.2) 100%);
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.2);
        }

        .nav-link.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 5px 25px rgba(102, 126, 234, 0.4);
        }

        .nav-link i {
            width: 22px;
            margin-right: 12px;
            font-size: 18px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 300px;
            display: flex;
            flex-direction: column;
            background: var(--light-bg);
            min-height: 100vh;
        }

        .topbar {
            background: white;
            padding: 20px 30px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(102, 126, 234, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-title h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .topbar-title p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #7f8c8d;
            font-weight: 400;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            text-align: right;
            font-size: 14px;
        }

        .user-info .user-name {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 2px;
        }

        .user-info .user-role {
            color: #7f8c8d;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-logout {
            background: linear-gradient(135deg, #ff6b9d 0%, #c44569 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(255, 107, 157, 0.3);
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 157, 0.4);
            background: linear-gradient(135deg, #c44569 0%, #a93257 100%);
        }

        .sidebar-footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            padding: 0 15px;
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
        }

        .content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            background: var(--light-bg);
        }

        /* Flash Messages */
        .alert {
            border-radius: 12px;
            margin-bottom: 24px;
            border: none;
            padding: 16px 20px;
            font-weight: 500;
            box-shadow: var(--card-shadow);
            animation: slideDown 0.4s ease;
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
            background: linear-gradient(135deg, #fff5f5 0%, #ffeaea 100%);
            color: #c0392b;
            border-left: 4px solid #e74c3c;
        }

        .alert-success {
            background: linear-gradient(135deg, #f0fdf4 0%, #e8f9e8 100%);
            color: #27ae60;
            border-left: 4px solid #2ecc71;
        }

        /* Card Styling */
        .card {
            background: white;
            box-shadow: var(--card-shadow);
            border: none;
            border-radius: var(--border-radius);
            margin-bottom: 24px;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            font-weight: 600;
            padding: 20px 24px;
            border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header i {
            font-size: 18px;
        }

        .card-body {
            padding: 24px;
        }

        /* Button Styling */
        .btn {
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ff6b9d 0%, #c44569 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 107, 157, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 157, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, #48dbfb 0%, #0abde3 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(72, 219, 251, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(72, 219, 251, 0.4);
        }

        .btn-light {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-light:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        /* Risk Level Badges */
        .badge {
            border-radius: 20px;
            padding: 6px 12px;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-extreme {
            background: linear-gradient(135deg, #c0392b 0%, #a93257 100%);
            color: white;
            box-shadow: 0 2px 8px rgba(192, 57, 43, 0.3);
        }

        .badge-high {
            background: linear-gradient(135deg, #e74c3c 0%, #c44569 100%);
            color: white;
            box-shadow: 0 2px 8px rgba(231, 76, 60, 0.3);
        }

        .badge-medium {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            color: white;
            box-shadow: 0 2px 8px rgba(243, 156, 18, 0.3);
        }

        .badge-low {
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
            color: white;
            box-shadow: 0 2px 8px rgba(39, 174, 96, 0.3);
        }

        /* Table Styling */
        .table {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--card-shadow);
        }

        .table thead th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            font-weight: 600;
            padding: 18px 20px;
            font-size: 14px;
        }

        .table td {
            padding: 16px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f3f4;
            font-size: 14px;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: linear-gradient(135deg, #f8f9ff 0%, #f0f4ff 100%);
            transform: scale(1.01);
        }

        /* Form Styling */
        .form-label {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--dark-color);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-label i {
            color: #667eea;
            font-size: 16px;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e8eaed;
            padding: 12px 16px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus {
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .form-control:hover {
            border-color: #d5dbdb;
        }

        /* Dashboard Stats */
        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: var(--card-shadow);
            border-left: 4px solid var(--secondary-color);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(30px, -30px);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(102, 126, 234, 0.2);
        }

        .stat-card h3 {
            margin: 0 0 8px;
            font-size: 32px;
            font-weight: 700;
            color: var(--dark-color);
            position: relative;
            z-index: 1;
        }

        .stat-card p {
            margin: 0;
            color: #7f8c8d;
            font-size: 14px;
            font-weight: 500;
            position: relative;
            z-index: 1;
        }

        .stat-card.border-danger {
            border-left-color: #ff6b9d;
        }

        .stat-card.border-danger::before {
            background: radial-gradient(circle, rgba(255, 107, 157, 0.1) 0%, transparent 70%);
        }

        .stat-card.border-warning {
            border-left-color: #feca57;
        }

        .stat-card.border-warning::before {
            background: radial-gradient(circle, rgba(254, 202, 87, 0.1) 0%, transparent 70%);
        }

        .stat-card.border-info {
            border-left-color: #48dbfb;
        }

        .stat-card.border-info::before {
            background: radial-gradient(circle, rgba(72, 219, 251, 0.1) 0%, transparent 70%);
        }

        .stat-card.border-success {
            border-left-color: #48dbfb;
        }

        .stat-card.border-success::before {
            background: radial-gradient(circle, rgba(72, 219, 251, 0.1) 0%, transparent 70%);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 280px;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                z-index: 1050;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .content {
                padding: 20px 15px;
            }

            .topbar {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .topbar-title h1 {
                font-size: 20px;
            }

            .topbar-title p {
                font-size: 13px;
            }

            .user-menu {
                width: 100%;
                justify-content: space-between;
                align-items: center;
            }

            .user-info {
                text-align: left;
            }

            .stat-card {
                padding: 20px;
            }

            .stat-card h3 {
                font-size: 28px;
            }

            .card-body {
                padding: 20px;
            }

            .table {
                font-size: 12px;
            }

            .table td, .table th {
                padding: 12px 8px;
            }
        }

        @media (max-width: 576px) {
            .content {
                padding: 15px;
            }

            .topbar-title h1 {
                font-size: 18px;
            }

            .stat-card {
                padding: 20px;
            }

            .stat-card h3 {
                font-size: 24px;
            }

            .card-body {
                padding: 20px;
            }

            .table {
                font-size: 12px;
            }

            .table td, .table th {
                padding: 12px 15px;
            }
        }

        /* Modal Optimization */
        .modal {
            --bs-backdrop-bg: rgba(0, 0, 0, 0.5);
            --bs-backdrop-opacity: 0.5;
        }

        .modal-backdrop {
            z-index: 1040;
            opacity: 0.5;
        }

        .modal {
            z-index: 1050;
        }

        .modal.show .modal-backdrop {
            opacity: 0.5;
        }

        .modal-dialog {
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal.fade .modal-dialog {
            transition: transform 0.3s ease-out;
        }

        /* Fix modal display issues */
        body.modal-open {
            overflow: hidden;
        }

        .modal-content {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border: none;
            border-radius: 12px 12px 0 0;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        .modal-body {
            padding: 25px;
        }

        .modal-footer {
            border-top: 1px solid #e9ecef;
            background: #f8f9fa;
            border-radius: 0 0 12px 12px;
        }

    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Sidebar Overlay -->
        <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div>
                        <h5>Risk Management</h5>
                        <p>COBIT 2019</p>
                    </div>
                </div>
            </div>

            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php?page=dashboard" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] === 'dashboard') ? 'active' : ''; ?>">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=framework" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] === 'framework') ? 'active' : ''; ?>">
                        <i class="fas fa-cube"></i> Framework COBIT
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=design-factor" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] === 'design-factor') ? 'active' : ''; ?>">
                        <i class="fas fa-cogs"></i> Design Factor
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=kontrol" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] === 'kontrol') ? 'active' : ''; ?>">
                        <i class="fas fa-shield-alt"></i> Penetapan Kontrol
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=risiko" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] === 'risiko') ? 'active' : ''; ?>">
                        <i class="fas fa-exclamation-triangle"></i> Penilaian Risiko
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=rekomendasi" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] === 'rekomendasi') ? 'active' : ''; ?>">
                        <i class="fas fa-lightbulb"></i> Rekomendasi
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <a href="index.php?page=logout" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Topbar -->
            <div class="topbar">
                <div class="topbar-title">
                    <h1><i class="fas fa-file-shield"></i> Risk Management System</h1>
                    <p>COBIT 2019 - Ayam Jingkrak TOB</p>
                </div>
                <div class="user-menu">
                    <div class="user-info">
                        <div class="user-name"><?php echo htmlspecialchars($_SESSION['user']['username']); ?></div>
                        <div class="user-role"><?php echo ucfirst($_SESSION['user']['role']); ?></div>
                    </div>
                    <div class="user-clock">
                        <span id="clock" style="font-weight:600;margin-left:20px;">--:--:--</span>
                        <br>
                        <small id="date">-</small>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="content">
                <?php if (isset($flash)): ?>
                    <div class="alert alert-<?php echo $flash['type'] === 'danger' ? 'danger' : 'success'; ?> alert-dismissible fade show" role="alert">
                        <i class="fas fa-<?php echo $flash['type'] === 'danger' ? 'exclamation-circle' : 'check-circle'; ?>"></i>
                        <?php echo $flash['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?php echo isset($content) ? $content : ''; ?>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    if (alert) {
                        var bsAlert = new bootstrap.Alert(alert);
                        bsAlert.close();
                    }
                }, 5000);
            });
        });

        // Mobile sidebar toggle
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        }

        // Close sidebar when clicking on a nav link (mobile)
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    toggleSidebar();
                }
            });
        });

        // Close sidebar on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                const sidebar = document.querySelector('.sidebar');
                const overlay = document.getElementById('sidebarOverlay');
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            }
        });
        // Real-time clock (Jam:Menit:Detik) dan tanggal Bahasa Indonesia
        function updateClock() {
            const now = new Date();
            const pad = (n) => n.toString().padStart(2, '0');
            const hours = pad(now.getHours());
            const minutes = pad(now.getMinutes());
            const seconds = pad(now.getSeconds());

            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            const dayName = days[now.getDay()];
            const date = now.getDate();
            const monthName = months[now.getMonth()];
            const year = now.getFullYear();

            const clockEl = document.getElementById('clock');
            const dateEl = document.getElementById('date');
            if (clockEl) clockEl.textContent = `${hours}:${minutes}:${seconds}`;
            if (dateEl) dateEl.textContent = `${dayName}, ${date} ${monthName} ${year}`;
        }

        // Jalankan segera dan setiap detik
        document.addEventListener('DOMContentLoaded', function() {
            updateClock();
            setInterval(updateClock, 1000);
        });
    </script>
</body>
</html>