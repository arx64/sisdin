<?php
/**
 * Main Router - index.php
 * Sistem Analisis Manajemen Risiko TI - COBIT 2019
 * 
 * Manual routing berdasarkan parameter GET "page"
 */

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Define base paths
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
define('CONFIG_PATH', BASE_PATH . '/config');
define('MODELS_PATH', APP_PATH . '/models');
define('CONTROLLERS_PATH', APP_PATH . '/controllers');
define('VIEWS_PATH', APP_PATH . '/views');

// Suppress errors display
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Include config and base classes
try {
    require_once CONFIG_PATH . '/database.php';
    require_once MODELS_PATH . '/Database.php';
    require_once MODELS_PATH . '/Model.php';
    require_once MODELS_PATH . '/Controller.php';
    
    // Load all models
    require_once MODELS_PATH . '/User.php';
    require_once MODELS_PATH . '/Risiko.php';
    require_once MODELS_PATH . '/DesignFactor.php';
    require_once MODELS_PATH . '/Rekomendasi.php';
    
    // Load all controllers
    require_once CONTROLLERS_PATH . '/AuthController.php';
    require_once CONTROLLERS_PATH . '/DashboardController.php';
    require_once CONTROLLERS_PATH . '/FrameworkController.php';
    require_once CONTROLLERS_PATH . '/DesignFactorController.php';
    require_once CONTROLLERS_PATH . '/RisikoController.php';
    require_once CONTROLLERS_PATH . '/RekomendasiController.php';
} catch (Exception $e) {
    die("Error loading files: " . $e->getMessage());
}

// Get page and action from GET parameters
$page = isset($_GET['page']) ? strtolower($_GET['page']) : 'dashboard';
$action = isset($_GET['action']) ? strtolower($_GET['action']) : 'index';

// Router handler
try {
    switch ($page) {
        case 'login':
            $controller = new AuthController();
            if ($action === 'process') {
                $controller->processLogin();
            } else {
                $controller->login();
            }
            break;

        case 'logout':
            $controller = new AuthController();
            $controller->logout();
            break;

        case 'dashboard':
            $controller = new DashboardController();
            $controller->index();
            break;

        case 'framework':
            $controller = new FrameworkController();
            $controller->index();
            break;

        case 'design-factor':
            $controller = new DesignFactorController();
            switch ($action) {
                case 'edit':
                    $controller->edit();
                    break;
                case 'update':
                    $controller->update();
                    break;
                default:
                    $controller->index();
            }
            break;

        case 'risiko':
            $controller = new RisikoController();
            switch ($action) {
                case 'create':
                    $controller->create();
                    break;
                case 'store':
                    $controller->store();
                    break;
                case 'edit':
                    $controller->edit();
                    break;
                case 'update':
                    $controller->update();
                    break;
                case 'delete':
                    $controller->delete();
                    break;
                default:
                    $controller->index();
            }
            break;

        case 'rekomendasi':
            $controller = new RekomendasiController();

            switch ($action) {

                case 'by-level':
                    $controller->byLevel();
                    break;

                case 'cetak':
                    $controller->cetak();
                    break;

                default:
                    $controller->index();
            }

            break;

        default:
            // Redirect to dashboard if page not found
            header("Location: index.php?page=dashboard");
            exit;
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>