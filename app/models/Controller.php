<?php
/**
 * Base Controller Class
 */
abstract class Controller {
    protected $user;

    public function __construct() {
        // Start session jika belum started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Set user dari session
        $this->user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    /**
     * Render view dengan layout
     */
    protected function view($viewName, $data = []) {
        // Extract data untuk bisa digunakan sebagai variable di view
        extract($data);

        // Start output buffering untuk view content
        ob_start();
        
        // Include view file
        $viewPath = __DIR__ . '/../views/' . $viewName . '.php';
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            die("View not found: " . $viewName);
        }
        
        // Get view content
        $content = ob_get_clean();

        // Include layout dan render
        $layoutPath = __DIR__ . '/../views/layout.php';
        if (file_exists($layoutPath)) {
            include $layoutPath;
        } else {
            // Fallback jika layout tidak ada
            echo $content;
        }
    }

    /**
     * Render view tanpa layout (untuk login, dll)
     */
    protected function viewRaw($viewName, $data = []) {
        // Extract data
        extract($data);
        
        // Include view file
        $viewPath = __DIR__ . '/../views/' . $viewName . '.php';
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            die("View not found: " . $viewName);
        }
    }

    /**
     * Redirect
     */
    protected function redirect($page) {
        header("Location: index.php?page=" . $page);
        exit;
    }

    /**
     * Check auth
     */
    protected function checkAuth() {
        if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }
    }

    /**
     * Check admin role
     */
    protected function checkAdmin() {
        $this->checkAuth();
        if ($_SESSION['user']['role'] !== 'admin') {
            header("Location: index.php?page=dashboard");
            exit;
        }
    }

    /**
     * Set flash message
     */
    protected function setFlash($type, $message) {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message
        ];
    }

    /**
     * Get flash message
     */
    protected function getFlash() {
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $flash;
        }
        return null;
    }
}
?>