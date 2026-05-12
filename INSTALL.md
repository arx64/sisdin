# PANDUAN INSTALASI DAN SETUP PROJECT

Sistem Analisis Manajemen Risiko TI - COBIT 2019

## ✅ Persyaratan Sistem

- PHP 7.2 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- Apache dengan mod_rewrite (opsional untuk clean URLs)
- Web server: XAMPP, Laragon, atau LEMP

## 📥 LANGKAH 1: Download & Setup Project

### A. Jika menggunakan XAMPP

1. Extract project ke folder: `C:\xampp\htdocs\Sistem2`
2. Pastikan Apache dan MySQL sudah running
3. Buka: http://localhost/Sistem2/public/

### B. Jika menggunakan Laragon

1. Extract project ke folder: `C:\laragon\www\Sistem2`
2. Pastikan Laragon running
3. Create virtual host (atau langsung akses): http://localhost/Sistem2/public/

### C. Jika menggunakan Server Linux

1. Extract ke: `/var/www/html/Sistem2`
2. Set permissions:
   ```bash
   chmod -R 755 /var/www/html/Sistem2
   chown -R www-data:www-data /var/www/html/Sistem2
   ```
3. Akses: http://localhost/Sistem2/public/ atau sesuai domain

## 🗄️ LANGKAH 2: Setup Database

### Pilihan A: Menggunakan phpMyAdmin

1. Buka phpMyAdmin: `http://localhost/phpmyadmin`
2. Klik menu **Import** di bagian atas
3. Pilih file: `database_setup.sql` (dari folder root project)
4. Klik tombol **Execute**
5. Tunggu sampai selesai. Anda akan melihat pesan "Database Setup Complete!"

### Pilihan B: Menggunakan Command Line (Windows - MySQL Command Prompt)

```bash
mysql -u root < database_setup.sql
```

### Pilihan C: Menggunakan Command Line (Linux Terminal)

```bash
mysql -u root -p < database_setup.sql
```

Jika diminta password, masukkan password MySQL Anda.

### Pilihan D: Manual Query

1. Di phpMyAdmin, klik **New**
2. Copy paste semua isi dari file `database_setup.sql`
3. Klik **Execute**

## ⚙️ LANGKAH 3: Konfigurasi Database (Jika Diperlukan)

Jika database connection error, edit file konfigurasi:

**File:** `config/database.php`

```php
define('DB_HOST', 'localhost');      // Host MySQL
define('DB_USER', 'root');           // Username MySQL (default: root)
define('DB_PASS', '');               // Password MySQL (default: kosong untuk XAMPP/Laragon)
define('DB_NAME', 'cobit_risiko_db'); // Nama database (harus sesuai)
define('DB_PORT', 3306);             // Port MySQL (default: 3306)
```

### Contoh untuk environment berbeda:

**XAMPP (Windows):**
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'cobit_risiko_db');
```

**Laragon (Windows):**
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'cobit_risiko_db');
```

**Linux dengan MySQL:**
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'ubuntu');       // atau user yang sudah dibuat
define('DB_PASS', 'password123');  // password MySQL Anda
define('DB_NAME', 'cobit_risiko_db');
```

**Linux dengan MariaDB:**
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'mysql_password');
define('DB_NAME', 'cobit_risiko_db');
```

## 🌐 LANGKAH 4: Akses Aplikasi

Buka browser dan akses URL:

```
http://localhost/Sistem2/public/
```

Anda akan diarahkan ke halaman login.

## 🔐 LANGKAH 5: Login ke Sistem

Gunakan salah satu demo credential berikut:

### Demo Account 1 - Admin (Full Access)
- **URL:** http://localhost/Sistem2/public/
- **Username:** `admin`
- **Password:** `admin123`
- **Role:** Admin
- **Access:** Bisa membuat, edit, hapus semua data

### Demo Account 2 - Kasir (View Only)
- **URL:** http://localhost/Sistem2/public/
- **Username:** `kasir`
- **Password:** `kasir123`
- **Role:** Kasir
- **Access:** Hanya bisa view/read data

Pilih salah satu akun untuk login.

## 📋 LANGKAH 6: Verifikasi Setup

Setelah login, cek bahwa semua fitur berjalan normal:

### Checklist:

- [ ] **Dashboard** - Buka menu Dashboard, lihat statistik risiko
- [ ] **Framework COBIT** - Buka menu Framework COBIT, lihat penjelasan APO12 & APO13
- [ ] **Design Factor** - Buka menu Design Factor, lihat daftar DF3/DF4/DF6/DF10
- [ ] **Data Penilaian** - Buka menu Data Penilaian, lihat tabel risiko
- [ ] **Rekomendasi** - Buka menu Rekomendasi, lihat solusi mitigasi
- [ ] **Filter/Search** - Coba filter risiko atau search
- [ ] **Create Data** (Admin only) - Jika login sebagai admin, coba buat risiko baru
- [ ] **Logout** - Coba logout dan login kembali

Jika semua checklist sudah terverifikasi, setup project sudah berhasil!

## 🖇️ URL Routes dalam Sistem

Berikut adalah daftar route yang tersedia dalam aplikasi:

```
index.php?page=login                    # Halaman Login
index.php?page=logout                   # Logout

index.php?page=dashboard                # Dashboard
index.php?page=framework                # Framework COBIT
index.php?page=design-factor            # Design Factor List
index.php?page=design-factor&action=edit&id=1    # Edit Design Factor

index.php?page=risiko                   # List Risiko
index.php?page=risiko&action=create     # Create Risiko
index.php?page=risiko&action=edit&id=1  # Edit Risiko
index.php?page=risiko&action=delete&id=1 # Delete Risiko
index.php?page=risiko&search=keyword    # Search Risiko
index.php?page=risiko&level=High        # Filter by Level

index.php?page=rekomendasi              # List Rekomendasi
```

## 🐛 Troubleshooting

### Problem 1: " Connection failed: Access denied for user 'root'@'localhost'"

**Penyebab:** Password MySQL salah atau username berbeda

**Solusi:**
1. Check password MySQL Anda
2. Edit `config/database.php` dengan credentials yang benar
3. Test dengan phpMyAdmin dulu

### Problem 2: "Database cobit_risiko_db not found"

**Penyebab:** Database belum dibuat

**Solusi:**
1. Buka phpMyAdmin
2. Import file `database_setup.sql` sesuai langkah di atas
3. Verify database sudah ada di list

### Problem 3: "Access Denied - Table doesn't exist"

**Penyebab:** Database atau tabel belum dibuat dengan sempurna

**Solusi:**
1. Drop database: `DROP DATABASE IF EXISTS cobit_risiko_db;`
2. Import kembali dari `database_setup.sql`
3. Verifikasi di phpMyAdmin

### Problem 4: Blank Page / Internal Server Error

**Penyebab:** PHP error atau file tidak ditemukan

**Solusi:**
1. Check error.log di server
2. Enable display_errors di `php.ini` (development only)
3. Pastikan semua file sudah ter-extract dengan sempurna
4. Check file permissions (chmod 755)

### Problem 5: CSS/Bootstrap tidak load (styling berantakan)

**Penyebab:** Bootstrap CDN tidak akses atau path salah

**Solusi:**
1. Check koneksi internet (CDN memerlukan koneksi)
2. Atau download Bootstrap locally dan ubah path di `layout.php`
3. Check browser console (F12) untuk lihat error

### Problem 6: Login gagal ("Username tidak ditemukan" atau "Password salah")

**Penyebab:** User belum ada di database

**Solusi:**
1. Verify database import berhasil
2. Check table `users` di phpMyAdmin
3. Pastikan ada user dengan username `admin` dan `kasir`
4. Try reset password via phpMyAdmin

## 🔧 Advanced Configuration

### Mengubah Database Charset

Jika terpilih charset berbeda, edit di `config/database.php`:

```php
// Tambahkan setelah koneksi
$conn->set_charset("utf8mb4"); // atau utf8 tergantung kebutuhan
```

### Mengaktifkan Clean URLs (Optional)

Jika menggunakan Apache, buka `.htaccess` di folder `public/` dan enable rewrite:

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

Kemudian akses dengan format clean URL:
```
http://localhost/Sistem2/public/dashboard
http://localhost/Sistem2/public/risiko
```

### Setting PHP max_upload_size (Optional)

Jika ingin mengupload file, edit `php.ini`:

```ini
upload_max_filesize = 100M
post_max_size = 100M
```

Restart Apache setelah perubahan.

## ✨ After Installation

Setelah setup berhasil, Anda bisa:

1. **Customization:**
   - Ubah branding di `layout.php` (title, logo, dll)
   - Ubah warna di CSS style

2. **Add More Users:**
   - Login sebagai admin
   - (Optional) Buat form untuk add user baru di admin panel

3. **Add Data:**
   - Login sebagai admin
   - Buat risiko baru via "Data Penilaian > Tambah Risiko"
   - System akan auto-calculate risk score

4. **Monitor:**
   - Lihat dashboard untuk overview risiko
   - Filter dan search risiko sesuai kebutuhan

## 📞 Support & Questions

Jika ada error atau pertanyaan:

1. **Check Error Log:**
   - Browser Console (F12)
   - MySQL error log
   - PHP error log

2. **Verify Setup:**
   - Pastikan database sudah import
   - Pastikan config database correct
   - Pastikan permissions sudah set

3. **Test Connection:**
   - Buka phpMyAdmin
   - Verify database `cobit_risiko_db` ada
   - Verify tables sudah terbuat
   - Verify data sample sudah ada

## 🎉 Setup Complete!

Jika semua langkah selesai tanpa error, aplikasi sudah siap digunakan!

---

**Built with ❤️ using PHP Native MVC Architecture**

