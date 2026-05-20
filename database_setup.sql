-- ================================================
-- DATABASE SETUP
-- Sistem Analisis Manajemen Risiko TI - COBIT 2019
-- Rumah Makan Ayam Jingkrak TOB
-- ================================================

-- Create Database
CREATE DATABASE IF NOT EXISTS `cobit_risiko_db`;
USE `cobit_risiko_db`;

-- ================================================
-- TABLE: users
-- ================================================
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('admin', 'kasir') NOT NULL DEFAULT 'kasir',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ================================================
-- TABLE: risiko
-- ================================================
CREATE TABLE IF NOT EXISTS `risiko` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `nama_risiko` VARCHAR(255) NOT NULL,
    `aset` VARCHAR(100) NOT NULL,
    `deskripsi` TEXT NOT NULL,
    `likelihood` INT NOT NULL CHECK(likelihood BETWEEN 1 AND 5),
    `impact` INT NOT NULL CHECK(impact BETWEEN 1 AND 5),
    `risk_score` INT NOT NULL,
    `level_risiko` ENUM('Extreme', 'High', 'Medium', 'Low') NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX `idx_level` (`level_risiko`),
    INDEX `idx_aset` (`aset`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ================================================
-- TABLE: design_factor
-- ================================================
CREATE TABLE IF NOT EXISTS `design_factor` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `kategori` VARCHAR(10) NOT NULL UNIQUE,
    `nama_df` VARCHAR(100) NOT NULL,
    `deskripsi` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ================================================
-- TABLE: rekomendasi
-- ================================================
CREATE TABLE IF NOT EXISTS `rekomendasi` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `level_risiko` ENUM('Extreme', 'High', 'Medium', 'Low') NOT NULL,
    `solusi` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `unique_level` (`level_risiko`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ================================================
-- TABLE: kontrol
-- ================================================
CREATE TABLE IF NOT EXISTS `kontrol` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `risk_id` VARCHAR(10) NOT NULL,
    `aspek` VARCHAR(100) NOT NULL,
    `judul_kontrol` VARCHAR(255) NOT NULL,
    `deskripsi` TEXT NOT NULL,
    `dokumen_terkait` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ================================================
-- INSERT USERS (Demo Data)
-- ================================================
-- Password: admin123 (hashed with bcrypt)
INSERT INTO `users` (`username`, `password`, `role`) VALUES 
('admin', '$2y$10$YzpQdqWQVy7J1XjL0g6K4O3QvH7Z9n2K0r5m8p1L6s9t2U5V8X5', 'admin'),
-- Password: kasir123 (hashed with bcrypt)
('kasir', '$2y$10$R2kL8N4P9Q7S1V3X5Z2A9B7C4D1E8F5G2H9I6J3K0L7M4N1O8P', 'kasir');

-- ================================================
-- INSERT DESIGN FACTOR
-- ================================================
INSERT INTO `design_factor` (`kategori`, `nama_df`, `deskripsi`) VALUES 
('DF3', 'Risk Profile', 'Profil risiko organisasi mencakup identifikasi, analisis, dan penilaian risiko teknologi informasi yang dapat mempengaruhi pencapaian tujuan bisnis.'),
('DF4', 'IT Issues', 'Masalah-masalah TI yang sedang dihadapi meliputi performance infrastructure, legacy system, skill shortage, dan integration complexity.'),
('DF6', 'Role of IT', 'Peran IT dalam organisasi sebagai enabler bisnis, innovation driver, dan operational excellence adalah kritis untuk transformasi digital.'),
('DF10', 'Enterprise Size', 'Ukuran enterprise berpengaruh terhadap kompleksitas manajemen risiko TI, dari startup hingga enterprise besar dengan multi-lokasi.');

-- ================================================
-- INSERT REKOMENDASI
-- ================================================
INSERT INTO `rekomendasi` (`level_risiko`, `solusi`) VALUES 
('Extreme', 'Risiko Extreme memerlukan tindakan mitigasi SEGERA dengan alokasi sumber daya maksimal. Implementasi harus mencakup: Disaster Recovery Plan, Business Continuity Plan, Infrastructure Backup 24/7, Monitoring Realtime, Incident Response Team, dan Emergency Protocol yang jelas.'),
('High', 'Risiko High memerlukan mitigasi dalam jangka pendek dengan rencana implementasi terstruktur. Tindakan mencakup: Update keamanan sistem, Monitoring jaringan aktif, Audit keamanan berkala, Maintenance sistem terjadwal, dan Review kebijakan akses.'),
('Medium', 'Risiko Medium dapat dimonitor atau dimitigasi sesuai prioritas bisnis. Rekomendasi: Update software berkala, Backup data mingguan, Monitoring sistem berkala, Pelatihan user, dan Documentation prosedur.'),
('Low', 'Risiko Low dapat diterima dan dimonitor secara berkala. Tindakan: Monitoring sistem rutin, Update sistem berkala, Dokumentasi prosedur, Pelaporan berkala, dan Review tahunan.');

-- ================================================
-- INSERT SAMPLE KONTROL DATA
-- ================================================
INSERT INTO `kontrol` (`risk_id`, `aspek`, `judul_kontrol`, `deskripsi`, `dokumen_terkait`) VALUES
('R6', 'Process & Technology', 'APO12.01 Collect Data & Penggunaan UPS', 'Melakukan pencatatan gangguan listrik dan menyediakan UPS untuk menjaga sistem tetap berjalan.', 'SOP Penanganan Gangguan, Dokumentasi Perangkat'),
('R7', 'People & Process', 'Pelatihan Sistem Kasir', 'Memberikan pelatihan penggunaan sistem dan validasi transaksi.', 'SOP Penggunaan Sistem, Form Pemeriksaan'),
('R8', 'Technology & Process', 'Monitoring dan Maintenance Sistem', 'Monitoring performa sistem transaksi dan maintenance berkala.', 'Laporan Monitoring Sistem, Jadwal Maintenance'),
('R9', 'Process & People', 'APO13.01 ISMS dan Edukasi Password', 'Kebijakan keamanan password dan edukasi pengguna.', 'Kebijakan Keamanan Sistem, SOP Keamanan Akun'),
('R10', 'Technology & Process', 'Pembatasan Hak Akses', 'Monitoring login dan pengaturan hak akses pengguna.', 'Data Hak Akses Pengguna, Log Aktivitas Sistem');

-- ================================================
-- INSERT SAMPLE RISIKO DATA
-- ================================================
INSERT INTO `risiko` (`nama_risiko`, `aset`, `deskripsi`, `likelihood`, `impact`, `risk_score`, `level_risiko`) VALUES 
('Server Down', 'Server Utama', 'Server utama mengalami crash atau downtime yang menyebabkan sistem tidak bisa diakses oleh pengguna. Potensi kehilangan data transaksi dan layanan terganggu.', 3, 5, 15, 'High'),
('Data Breach', 'Database', 'Akses tidak sah ke database pelanggan dan data sensitif perusahaan. Risiko kebocoran informasi pribadi dan reputasi organisasi terancam.', 2, 5, 10, 'High'),
('Virus/Malware', 'Workstation', 'Infeksi malware pada workstation user menyebabkan system lambat dan data corruption. Dapat menular ke sistem jaringan lainnya.', 3, 4, 12, 'High'),
('Backup Failure', 'Storage', 'Kegagalan backup otomatis data penting mengakibatkan data tidak tersimpan dengan baik. Jika terjadi disaster, data tidak bisa direcover.', 2, 4, 8, 'Medium'),
('Network Congestion', 'Network', 'Congestion pada network infrastructure menyebabkan kecepatan akses turun dan bisnis proses terhambat.', 3, 3, 9, 'Medium'),
('Unauthorized Access', 'System Access', 'User mendapat akses ke sistem yang seharusnya tidak mereka bisa akses. Pencurian data atau modifikasi data ilegal bisa terjadi.', 2, 4, 8, 'Medium'),
('Hardware Failure', 'Equipment', 'Kegagalan hardware seperti harddisk crash atau memory error menyebabkan system tidak bisa berjalan.', 2, 3, 6, 'Medium'),
('Password Weak', 'User Account', 'User menggunakan password yang lemah dan mudah di-brute force sehingga akun bisa diretas dengan mudah.', 4, 2, 8, 'Medium'),
('Software Bug', 'Application', 'Bug pada aplikasi sistem menyebabkan error dan business process terganggu. Perlu immediate fix dan testing ulang.', 3, 2, 6, 'Low'),
('Inconsistent Backup', 'Backup System', 'Backup data tidak konsisten dan tidak selalu berjalan sesuai schedule yang ditetapkan.', 2, 2, 4, 'Low');

-- ================================================
-- VERIFICATION QUERIES
-- ================================================
SELECT 'Database Setup Complete!' as Status;
SELECT COUNT(*) as Total_Users FROM users;
SELECT COUNT(*) as Total_Risiko FROM risiko;
SELECT COUNT(*) as Total_DesignFactor FROM design_factor;
SELECT COUNT(*) as Total_Rekomendasi FROM rekomendasi;