<?php
/**
 * Auth Controller
 */
class AuthController extends Controller {
    private $userModel;

    public function __construct() {
        parent::__construct();
        require_once __DIR__ . '/../models/User.php';
        $this->userModel = new User();
    }

    /**
     * Show login page
     */
    public function login() {
        // Jika sudah login, redirect ke dashboard
        if (isset($_SESSION['user'])) {
            $this->redirect('dashboard');
        }

        $flash = $this->getFlash();
        $this->viewRaw('login', compact('flash'));
    }

    /**
     * Process login
     */
    public function processLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Validasi input
            if (empty($username) || empty($password)) {
                $this->setFlash('danger', 'Username dan password harus diisi');
                $this->redirect('login');
            }

            // Get user dari database
            $user = $this->userModel->getByUsername($username);

            if (!$user) {
                $this->setFlash('danger', 'Username tidak ditemukan');
                $this->redirect('login');
            }

            // Verify password
            if (!$this->userModel->verifyPassword($password, $user['password'])) {
                $this->setFlash('danger', 'Password salah');
                $this->redirect('login');
            }

            // Set session
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role']
            ];

            $this->setFlash('success', 'Login berhasil');
            $this->redirect('dashboard');
        }
    }

    /**
     * Logout
     */
    public function logout() {
        session_destroy();
        $this->redirect('login');
    }
}
?>