<?php
/**
 * Application router
 */
class App {
    public static function route() {
        $page = isset($_GET['page']) ? strtolower($_GET['page']) : 'dashboard';
        $action = isset($_GET['action']) ? strtolower($_GET['action']) : 'index';

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

                case 'kontrol':
                    $controller = new KontrolController();
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
                    header('Location: index.php?page=dashboard');
                    exit;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>