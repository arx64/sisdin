Sistem2/
│
├── /app/
│   ├── /controllers/
│   │   ├── AuthController.php          # Login/Logout logic
│   │   ├── DashboardController.php     # Dashboard overview
│   │   ├── FrameworkController.php     # COBIT 2019 APO12/APO13
│   │   ├── DesignFactorController.php  # Design Factor management
│   │   ├── RisikoController.php        # Risk CRUD operations
│   │   └── RekomendasiController.php   # Recommendation management
│   │
│   ├── /models/
│   │   ├── Database.php                # Database connection & query execution
│   │   ├── Model.php                   # Base Model class (extends by all models)
│   │   ├── Controller.php              # Base Controller class (with view/redirect utilities)
│   │   ├── User.php                    # User model & authentication
│   │   ├── Risiko.php                  # Risk management model
│   │   ├── DesignFactor.php            # Design factor model
│   │   └── Rekomendasi.php             # Recommendation model
│   │
│   └── /views/
│       ├── layout.php                  # Main layout template with sidebar
│       ├── login.php                   # Login page (standalone)
│       ├── /dashboard/
│       │   └── index.php               # Dashboard with statistics
│       ├── /framework/
│       │   └── index.php               # Framework COBIT explanation
│       ├── /design_factor/
│       │   ├── index.php               # Design factor list
│       │   └── edit.php                # Edit design factor (admin)
│       ├── /risiko/
│       │   ├── index.php               # Risk list with filter/search
│       │   ├── create.php              # Create new risk form
│       │   └── edit.php                # Edit risk form
│       └── /rekomendasi/
│           └── index.php               # Recommendations list
│
├── /config/
│   └── database.php                    # Database configuration
│
├── /public/
│   ├── index.php                       # Main router & entry point
│   ├── .htaccess                       # Apache rewrite rules (optional)
│   └── /assets/                        # Static files (css, js, images)
│       ├── /css/                       # Custom CSS (optional)
│       └── /js/                        # Custom JavaScript (optional)
│
├── database_setup.sql                  # Complete database schema with sample data
├── README.md                           # Project documentation
├── INSTALL.md                          # Installation & setup guide
└── .gitignore                          # Git ignore file


📊 FITUR YANG SUDAH DIIMPLEMENTASIKAN:

✅ Authentication System
   - Login page dengan demo credentials (admin/kasir)
   - Session management
   - Role-based access control (Admin/Kasir)
   - Password hashing dengan bcrypt
   - Logout functionality

✅ Dashboard
   - Statistik risiko (Extreme/High/Medium/Low)
   - Total risiko counter
   - Latest risiko entries
   - Overview sistem

✅ Framework COBIT 2019
   - APO12 (Manage Risk) - Penjelasan & objectives
   - APO13 (Manage Security) - Penjelasan & objectives
   - Static content dari database

✅ Design Factor
   - View semua design factor (DF3, DF4, DF6, DF10)
   - Edit design factor (admin only)
   - Modal untuk detail view

✅ Data Penilaian (Risk Management)
   - List semua risiko dengan pagination
   - Create risiko baru (admin only)
   - Edit risiko (admin only)
   - Delete risiko (admin only)
   - View detail risiko dalam modal
   - Auto-calculate risk score (likelihood × impact)
   - Auto-categorize level risiko
   - Filter by level risiko
   - Search risiko by nama/aset/deskripsi

✅ Rekomendasi
   - Generate otomatis berdasarkan level risiko
   - Recommendation untuk Extreme/High/Medium/Low
   - Detail view dengan penjelasan

✅ User Interface
   - Bootstrap 5 responsive design
   - Sidebar navigation menu sesuai HIPO
   - Color-coded risk levels (Red/Orange/Yellow/Green)
   - Flash messages (success/error notifications)
   - Modal popups untuk detail view
   - Mobile-friendly responsive layout


🔐 KEAMANAN (Basic Level):

✅ Password hashing dengan bcrypt
✅ Session management dengan PHP $_SESSION
✅ Login validation
✅ Role-based access control
✅ Redirect unauthorized access
✅ Input escaping dengan htmlspecialchars()
✅ SQL query using mysqli


🗄️ DATABASE SCHEMA:

TABLE: users
  - id (INT, PK, AI)
  - username (VARCHAR 50, UNIQUE)
  - password (VARCHAR 255, Bcrypt hashed)
  - role (ENUM: admin, kasir)
  - created_at (TIMESTAMP)
  - updated_at (TIMESTAMP)

TABLE: risiko
  - id (INT, PK, AI)
  - nama_risiko (VARCHAR 255)
  - aset (VARCHAR 100)
  - deskripsi (TEXT)
  - likelihood (INT 1-5, CHECK constraint)
  - impact (INT 1-5, CHECK constraint)
  - risk_score (INT, auto-calculated)
  - level_risiko (ENUM: Extreme, High, Medium, Low, auto-categorized)
  - created_at (TIMESTAMP)
  - updated_at (TIMESTAMP)
  - Indexes: level_risiko, aset

TABLE: design_factor
  - id (INT, PK, AI)
  - kategori (VARCHAR 10, UNIQUE) - DF3, DF4, DF6, DF10
  - nama_df (VARCHAR 100)
  - deskripsi (TEXT)
  - created_at (TIMESTAMP)
  - updated_at (TIMESTAMP)

TABLE: rekomendasi
  - id (INT, PK, AI)
  - level_risiko (ENUM: Extreme, High, Medium, Low, UNIQUE)
  - solusi (TEXT)
  - created_at (TIMESTAMP)
  - updated_at (TIMESTAMP)


📈 RISK CALCULATION LOGIC:

Risk Score = Likelihood × Impact

Level Categories:
  - Low: 1-4 (Accept)
  - Medium: 5-9 (Monitor/Mitigate)
  - High: 10-16 (Mitigate)
  - Extreme: 17-25 (Immediate Action)

Likelihood Scale (1-5):
  1 = Sangat Jarang
  2 = Jarang
  3 = Sedang
  4 = Sering
  5 = Sangat Sering

Impact Scale (1-5):
  1 = Sangat Kecil
  2 = Kecil
  3 = Sedang
  4 = Besar
  5 = Sangat Besar


🎨 UI FEATURES:

✅ Responsive Bootstrap 5 grid layout
✅ Sidebar navigation with icons
✅ Color-coded risk level badges
✅ Dashboard stat cards
✅ Data tables with hover effects
✅ Modal popups for details
✅ Flash notifications (auto-dismiss after 5s)
✅ Form inputs with validation styling
✅ Gradient headers
✅ Icon integration (Font Awesome 6)
✅ Clean typography and spacing


🚀 HOW THE APPLICATION WORKS:

1. User accesses public/index.php (router)
2. Router checks 'page' parameter from GET request
3. Router loads appropriate Controller
4. Controller checks authentication & authorization
5. Controller loads necessary Model(s)
6. Controller executes business logic
7. Controller renders View with data
8. Base Controller combines View + Layout
9. HTML rendered to browser

Request Flow Example:
  http://localhost/Sistem2/public/index.php?page=risiko&action=create
  → Router → RisikoController::create()
  → Check admin role
  → Load Risiko model
  → Render risiko/create.php view
  → Include layout.php template
  → Display to browser


📝 SAMPLE DATA INCLUDED:

✅ 2 Demo Users:
   - admin / admin123 (role: admin)
   - kasir / kasir123 (role: kasir)

✅ 4 Design Factors pre-populated:
   - DF3 (Risk Profile)
   - DF4 (IT Issues)
   - DF6 (Role of IT)
   - DF10 (Enterprise Size)

✅ 4 Rekomendasi entries:
   - Extreme level recommendations
   - High level recommendations
   - Medium level recommendations
   - Low level recommendations

✅ 10 Sample Risko entries:
   - Various risk levels
   - Different assets and descriptions
   - Real-world scenarios for testing


⚙️ TECHNICAL SPECIFICATIONS:

Language: PHP 7.2+
Database: MySQL 5.7+ / MariaDB
Frontend: HTML5 + Bootstrap 5 + JavaScript
Architecture: Manual MVC (PHP Native, no framework)
Session: PHP $_SESSION
Routing: Manual GET parameter based
Database Access: mysqli
Password Hashing: bcrypt (password_hash/password_verify)
Charset: UTF-8MB4
API: Not RESTful (Traditional form submission)


📦 FILE SIZE & COUNT:

Total Files: 30+
  - PHP Files: 18
  - View Files: 10
  - Config: 1
  - SQL: 1
  - Docs: 3

Estimated Size: ~400KB (without node_modules/vendor)


🔄 NEXT STEPS UNTUK PRODUCTION:

[ ] Enable HTTPS/SSL
[ ] Implement CSRF token protection
[ ] Add input sanitization (htmlspecialchars more thoroughly)
[ ] Implement rate limiting on login
[ ] Add audit logging for admin actions
[ ] Implement two-factor authentication
[ ] Add data backup functionality
[ ] Implement more granular role-based permissions
[ ] Add API endpoints (optional)
[ ] Setup monitoring & error tracking
[ ] Load testing & optimization
[ ] Security audit & penetration testing


✅ READY TO RUN ON:

✅ XAMPP (Windows)
✅ Laragon (Windows)
✅ LAMP Stack (Linux Apache MySQL PHP)
✅ LEMP Stack (Linux Nginx MySQL PHP-FPM)
✅ Traditional Hosting (cPanel, Plesk, etc)


🎓 LEARNING VALUE:

Proyek ini mengajarkan:
✅ PHP Native development (tanpa framework)
✅ Manual MVC architecture implementation
✅ Object-oriented PHP programming
✅ Database design & normalization
✅ Form handling & validation
✅ Session management & authentication
✅ Template rendering
✅ Clean code principles & practices
✅ COBIT 2019 framework basics
✅ Web application security basics

