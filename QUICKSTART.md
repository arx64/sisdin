# 🚀 QUICK START GUIDE

Sistem Analisis Manajemen Risiko TI - COBIT 2019

## ⚡ 5 MINUTE SETUP

### Step 1: Extract Project
```
Extract ke: C:/xampp/htdocs/Sistem2 (atau lokasi server Anda)
```

### Step 2: Import Database
```
1. Buka: http://localhost/phpmyadmin
2. Klik "Import"
3. Pilih file: database_setup.sql
4. Klik "Execute"
5. Done! Database sudah ready
```

### Step 3: Access Application
```
Buka browser: http://localhost/Sistem2/public/
```

### Step 4: Login
```
Username: admin
Password: admin123
```

✅ **Selesai! Aplikasi ready to use.**

---

## 🎯 MAIN MENU OVERVIEW

### 1. Dashboard
- Lihat statistik risiko (Extreme, High, Medium, Low)
- Total risiko counter
- Recent risiko entries

### 2. Framework COBIT
- Informasi APO12 (Manage Risk)
- Informasi APO13 (Manage Security)
- Objectives dan processes

### 3. Design Factor
- DF3, DF4, DF6, DF10 documentation
- Edit factor (admin only)

### 4. Data Penilaian
- **View/Search:** Lihat semua risiko, cari, filter by level (kasir bisa)
- **Create:** Buat risiko baru (admin only)
- **Edit/Delete:** Ubah atau hapus risiko (admin only)
- **Risk Score:** Otomatis dihitung (Likelihood × Impact)

### 5. Rekomendasi
- Lihat rekomendasi per level risiko
- Solusi mitigasi untuk Extreme/High/Medium/Low

---

## 👥 DEMO ACCOUNTS

| Role  | Username | Password  | Access                              |
|-------|----------|-----------|-------------------------------------|
| Admin | admin    | admin123  | Full CRUD, edit design factor       |
| Kasir | kasir    | kasir123  | View only, search & filter          |

---

## 📊 KEY FEATURES

### Risk Calculation
```
Formula: Risk Score = Likelihood × Impact
Example: 3 × 4 = 12 (Level: High)
```

### Risk Levels
- **Extreme** (17-25): Immediate Action
- **High** (10-16): Mitigate Now
- **Medium** (5-9): Monitor/Mitigate
- **Low** (1-4): Accept

### Available Actions
- ✅ Create risk (Admin)
- ✅ Edit risk (Admin)
- ✅ Delete risk (Admin)
- ✅ View risk details (All)
- ✅ Search risk (All)
- ✅ Filter by level (All)
- ✅ View recommendations (All)

---

## 🔍 NAVIGATION EXAMPLES

### As Admin - Full Access
```
1. Login → Dashboard
2. Data Penilaian → Create New Risk
3. Fill form (Nama, Aset, Deskripsi, Likelihood, Impact)
4. Submit → Risk saved with auto-calculated score
5. Edit/Delete as needed
```

### As Kasir - View Only
```
1. Login → Dashboard
2. Data Penilaian → View all risks
3. Search/Filter risks
4. View detail in modal
5. View Rekomendasi
6. Cannot create/edit/delete
```

---

## 📁 FILE LOCATIONS

| What | Where |
|------|-------|
| **Entry Point** | `public/index.php` |
| **Database Config** | `config/database.php` |
| **Controllers** | `app/controllers/` |
| **Models** | `app/models/` |
| **Views** | `app/views/` |
| **Database Schema** | `database_setup.sql` |
| **Full Docs** | `README.md` |
| **Full Setup Guide** | `INSTALL.md` |

---

## ⚙️ CONFIG FILE (If Needed)

**File:** `config/database.php`

If connection error, update:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');  // Usually empty for XAMPP
define('DB_NAME', 'cobit_risiko_db');
```

---

## 🐛 COMMON ISSUES & FIXES

| Issue | Solution |
|-------|----------|
| Login failed | Import database from SQL file |
| Blank page | Check `config/database.php` settings |
| Database error | Verify MySQL is running, database imported |
| Styling broken | Check internet (Bootstrap CDN needs internet) |
| File not found | Check file permissions (chmod 755) |

---

## ✅ VERIFICATION CHECKLIST

After setup, verify these work:

- [ ] Dashboard loads with statistics
- [ ] Can see all 5 menu items
- [ ] Search works in Data Penilaian
- [ ] Filter by level works
- [ ] Admin can create risk
- [ ] Admin can edit risk
- [ ] Admin can delete risk
- [ ] View risk detail in modal
- [ ] Logout works
- [ ] Can login again

---

## 📚 LEARN MORE

For detailed information, read:
- `README.md` - Full documentation
- `INSTALL.md` - Complete setup guide
- `PROJECT_STRUCTURE.md` - Project architecture
- Code comments in PHP files

---

## 🎨 UI TOUR

### Sidebar Navigation
- Dashboard (Overview)
- Framework COBIT (Education)
- Design Factor (Config)
- Data Penilaian (Main CRUD)
- Rekomendasi (Solutions)
- Logout (Exit)

### Color Coding
- 🔴 Red = Extreme Risk
- 🟠 Orange = High Risk
- 🟡 Yellow = Medium Risk
- 🟢 Green = Low Risk

### Responsive Design
- Works on desktop (optimized)
- Works on tablet (responsive)
- Works on mobile (limited)

---

## 💡 TIPS & TRICKS

1. **Quick Navigate:** Use sidebar menu
2. **Search Multiple Ways:**
   - By risk name
   - By asset name
   - By description
3. **Filter by Level:** Quickly see specific risk categories
4. **View Modal Details:** Click eye icon for full details
5. **Admin Tips:**
   - Create test data first
   - Edit/delete as needed for testing
   - Export recommendations for reporting

---

## 🔒 SECURITY INFO

- Passwords hashed with bcrypt
- Session tracked with PHP SESSION
- Role-based access enforced
- Basic input validation included
- For production: Add HTTPS, CSRF tokens, better validation

---

## 📞 NEED HELP?

1. Check INSTALL.md for setup issues
2. Check README.md for detailed features
3. Check PROJECT_STRUCTURE.md for architecture
4. Check error logs in:
   - Browser console (F12)
   - phpMyAdmin (check database)
   - PHP error log

---

## 🎉 YOU'RE READY!

Aplikasi siap digunakan. Selamat menggunakan!

Built with ❤️ using PHP Native MVC

