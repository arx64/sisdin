# 📊 Sistem Analisis Manajemen Risiko TI - COBIT 2019

**Aplikasi web berbasis PHP Native dengan arsitektur MVC manual yang scalable dan clean.**

Studi kasus: Rumah Makan Ayam Jingkrak TOB

## 🎯 Fitur Utama

1. **Dashboard** - Ringkasan risiko dengan statistik real-time
2. **Framework COBIT** - Penjelasan APO12 (Manage Risk) dan APO13 (Manage Security)
3. **Design Factor** - Konfigurasi faktor desain untuk analisis risiko
4. **Data Penilaian** - CRUD data risiko dengan perhitungan risk score otomatis
5. **Rekomendasi** - Rekomendasi mitigasi berdasarkan level risiko
6. **Auth System** - Login dengan role-based access (Admin & Kasir)

## 🔐 Role & Permission

- **Admin**: Full akses, bisa membuat, edit, dan hapus risiko
- **Kasir**: Hanya bisa view data risiko (read-only)

## 💻 Teknologi Stack

- **PHP Native** (tanpa framework)
- **MySQL** (Database)
- **Bootstrap 5** (UI)
- **JavaScript** (Client-side interaction)
- **MVC Architecture** (Manual implementation)

## 📁 Folder Structure

```
/Sistem2
├── /app
│   ├── /controllers
│   │   ├── AuthController.php
│   │   ├── DashboardController.php
│   │   ├── FrameworkController.php
│   │   ├── DesignFactorController.php
│   │   ├── RisikoController.php
│   │   └── RekomendasiController.php
│   ├── /models
│   │   ├── Database.php
│   │   ├── Model.php
│   │   ├── Controller.php
│   │   ├── User.php
│   │   ├── Risiko.php
│   │   ├── DesignFactor.php
│   │   └── Rekomendasi.php
│   └── /views
│       ├── layout.php (Template layout)
│       ├── login.php
│       ├── /dashboard
│       ├── /framework
│       ├── /design_factor
│       ├── /risiko
│       └── /rekomendasi
├── /config
│   └── database.php
├── /public
│   ├── index.php (Router)
│   └── /assets
├── database_setup.sql
└── README.md
```

## 🚀 Cara Menjalankan Project

### 1. Setup Database

#### Menggunakan XAMPP/Laragon:
1. Buka **phpMyAdmin** (biasanya `http://localhost/phpmyadmin`)
2. Klik **Import**
3. Pilih file `database_setup.sql`
4. Klik **Execute**

#### Atau menggunakan Command Line:
```bash
mysql -u root < database_setup.sql
```

### 2. Konfigurasi Database (Jika Diperlukan)

Edit file `config/database.php`:
```php
define('DB_HOST', 'localhost');      // Host MySQL
define('DB_USER', 'root');           // Username MySQL
define('DB_PASS', '');               // Password MySQL
define('DB_NAME', 'cobit_risiko_db'); // Nama database
define('DB_PORT', 3306);             // Port MySQL
```

### 3. Akses Aplikasi

- **URL**: `http://localhost/Sistem2/public/` (atau sesuai konfigurasi server kamu)
- Atau jika menggunakan Apache dengan VirtualHost: `http://cobit-risiko.local/`

### 4. Login Demo

**Admin Account:**
- Username: `admin`
- Password: `admin123`
- Role: Admin (Full Access)

**Kasir Account:**
- Username: `kasir`
- Password: `kasir123`
- Role: Kasir (View Only)

## 📊 Database Schema

### Table: users
```
- id (INT, Primary Key)
- username (VARCHAR 50, UNIQUE)
- password (VARCHAR 255, Bcrypt hashed)
- role (ENUM: admin, kasir)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

### Table: risiko
```
- id (INT, Primary Key)
- nama_risiko (VARCHAR 255)
- aset (VARCHAR 100)
- deskripsi (TEXT)
- likelihood (INT 1-5)
- impact (INT 1-5)
- risk_score (INT) - Auto calculated: likelihood × impact
- level_risiko (ENUM: Extreme, High, Medium, Low)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

### Table: design_factor
```
- id (INT, Primary Key)
- kategori (VARCHAR 10, UNIQUE) - DF3, DF4, DF6, DF10
- nama_df (VARCHAR 100)
- deskripsi (TEXT)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

### Table: rekomendasi
```
- id (INT, Primary Key)
- level_risiko (ENUM: Extreme, High, Medium, Low)
- solusi (TEXT)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

## 📈 Risk Calculation

### Risk Score Formula
```
Risk Score = Likelihood × Impact
```

### Risk Level Categories
- **Low**: Score 1-4 (Accept)
- **Medium**: Score 5-9 (Monitor/Mitigate)
- **High**: Score 10-16 (Mitigate)
- **Extreme**: Score 17-25 (Immediate Action)

### Likelihood Scale (1-5)
1 = Sangat Jarang (Very Rare)
2 = Jarang (Rare)
3 = Sedang (Medium)
4 = Sering (Frequent)
5 = Sangat Sering (Very Frequent)

### Impact Scale (1-5)
1 = Sangat Kecil (Very Small)
2 = Kecil (Small)
3 = Sedang (Medium)
4 = Besar (Large)
5 = Sangat Besar (Very Large)

## 🎨 UI Features

- **Responsive Design**: Mobile-friendly dengan Bootstrap 5
- **Sidebar Navigation**: Menu sidebar dengan icon yang intuitif
- **Data Tables**: Tabel interaktif dengan sort dan filter
- **Dashboard Stats**: Card statistik risiko dengan visual badge
- **Modal Popups**: Detail view tanpa page navigation
- **Flash Messages**: Notification untuk success/error action
- **Dark Header**: Gradient header dengan branding
- **Color Coding**: Risiko berbeda warna untuk identifikasi cepat
  - Red: Extreme
  - Orange: High
  - Yellow: Medium
  - Green: Low

## 🔧 Key Features

### 1. Clean URL Routing
```
index.php?page=dashboard
index.php?page=risiko&action=create
index.php?page=risiko&action=edit&id=1
index.php?page=login&action=process
```

### 2. OOP Implementation
- Base `Model` class untuk semua model
- Base `Controller` class untuk semua controller
- `Database` class untuk database operations

### 3. MVC Separation
- **Model**: Handle database queries
- **View**: Display HTML only
- **Controller**: Business logic

### 4. Session Management
- Login/Logout system
- Role-based access control
- Flash message for notifications

### 5. Data Validation
- Basic input validation
- SQL injection prevention dengan prepared statements
- Password hashing dengan bcrypt

## 📝 Menu & Navigation (Sesuai HIPO)

1. **Dashboard** - Overview sistem
2. **Framework COBIT** - Dokumentasi framework
3. **Design Factor** - Konfigurasi DF3, DF4, DF6, DF10
4. **Data Penilaian** - CRUD Risiko
5. **Rekomendasi** - Mitigasi berdasarkan level

## 🎯 APO12 & APO13 Focus

### APO12 - Manage Risk
- Risk Identification
- Risk Analysis
- Risk Response
- Risk Monitoring

### APO13 - Manage Security
- Information Security Policies
- Information Classification
- Access Management
- Security Awareness

## ⚙️ Konfigurasi Server

### Persyaratan Minimum
- PHP 7.2+
- MySQL 5.7+
- Apache dengan mod_rewrite

### Apache Configuration
```apache
<Directory "/var/www/Sistem2/public">
    AllowOverride All
    Require all granted
</Directory>
```

### .htaccess (Optional untuk cleaner URL)
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php?page=$1 [QSA,L]
```

## 🐛 Troubleshooting

### Database Connection Error
- Pastikan MySQL server running
- Check username/password di `config/database.php`
- Pastikan database `cobit_risiko_db` sudah dibuat

### Page Not Found
- Akses melalui `public/index.php?page=dashboard`
- Check folder permissions

### Login Gagal
- Pastikan user sudah tersimpan di database
- Cek password hash di table users

### CSS/JS Not Loading
- Bootstrap CDN memerlukan koneksi internet
- Atau download Bootstrap locally dan ubah path di layout.php

## 📚 Sample Usage

### Membuat Risiko Baru (Admin)
1. Login dengan akun admin
2. Klik menu "Data Penilaian"
3. Klik tombol "Tambah Risiko"
4. Isi form:
   - Nama Risiko: "Server Down"
   - Aset: "Server Utama"
   - Deskripsi: "..."
   - Likelihood: 3
   - Impact: 5
   - Risk Score otomatis: 3 × 5 = 15 (High)
5. Klik "Simpan"

### Filter Risiko
1. Di halaman "Data Penilaian"
2. Gunakan filter:
   - Search: Cari berdasarkan nama/aset/deskripsi
   - Level: Filter berdasarkan level risiko

### Lihat Dashboard
1. Di halaman Dashboard
2. Lihat statistik:
   - Total risiko
   - Risiko per level (Extreme, High, Medium, Low)
   - Recent risiko entries

## 🔐 Security Best Practices

- **Password Hashing**: Menggunakan bcrypt (password_hash)
- **Session Management**: SESSION untuk auth tracking
- **SQL Injection Prevention**: Escape string input
- **XSS Prevention**: htmlspecialchars() untuk output
- **CSRF Protection**: Bisa ditambahkan dengan token
- **Role-based Access**: Check role sebelum allow action

Untuk production, tambahkan:
- HTTPS/SSL
- CSRF tokens
- Input sanitization lebih ketat
- Rate limiting pada login
- Logging dan audit trail
- Two-factor authentication

## 📖 Code Example

### Model (User.php)
```php
class User extends Model {
    protected $table = 'users';
    
    public function getByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        return $this->fetchOne($sql);
    }
}
```

### Controller (RisikoController.php)
```php
public function store() {
    $this->checkAdmin();
    
    $data = [
        'nama_risiko' => $_POST['nama_risiko'],
        'aset' => $_POST['aset'],
        'deskripsi' => $_POST['deskripsi'],
        'likelihood' => $_POST['likelihood'],
        'impact' => $_POST['impact']
    ];
    
    $result = $this->risikoModel->createRisiko($data);
    
    if ($result) {
        $this->setFlash('success', 'Risiko berhasil ditambahkan');
    }
}
```

### View (risiko/create.php)
```php
<form method="POST" action="index.php?page=risiko&action=store">
    <input type="text" name="nama_risiko" required>
    <select name="likelihood" required>
        <option value="1">1 - Sangat Jarang</option>
        ...
    </select>
    <button type="submit">Simpan</button>
</form>
```

## 🎓 Learning Points

Proyek ini mengajarkan:
- PHP Native development tanpa framework
- Manual MVC architecture implementation
- Database design dan normalization
- Session management
- Form handling dan validation
- Template rendering
- Clean code practices
- COBIT 2019 framework basics

## 📞 Support

Jika ada pertanyaan atau error:
1. Check error di browser console (F12)
2. Check MySQL error log
3. Review code sesuai dengan struktur MVC
4. Test database connection di phpMyAdmin

## ✅ Testing Checklist

- [ ] Login dengan admin account
- [ ] Login dengan kasir account
- [ ] Create risiko baru
- [ ] Edit risiko
- [ ] Delete risiko
- [ ] View risiko detail
- [ ] Filter risiko by level
- [ ] Search risiko
- [ ] View framework COBIT
- [ ] View design factor
- [ ] View rekomendasi
- [ ] Dashboard menampilkan statistik
- [ ] Logout

## 📄 License

Private Project - Rumah Makan Ayam Jingkrak TOB

---

**Built with ❤️ using PHP Native MVC Architecture**

