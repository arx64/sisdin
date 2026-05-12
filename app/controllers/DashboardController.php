<?php
/**
 * Dashboard Controller
 */
class DashboardController extends Controller {
    private $risikoModel;

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
        require_once __DIR__ . '/../models/Risiko.php';
        $this->risikoModel = new Risiko();
    }

    /**
     * Show dashboard
     */
    public function index() {
        // Get semua risiko
        $allRisiko = $this->risikoModel->getAll();

        // Get total risiko by level
        $risikoByLevel = $this->risikoModel->getTotalByLevel();

        // Siapkan data untuk chart
        $risikoStats = [
            'total' => count($allRisiko),
            'extreme' => 0,
            'high' => 0,
            'medium' => 0,
            'low' => 0
        ];

        foreach ($risikoByLevel as $item) {
            $level = strtolower($item['level_risiko']);
            if (isset($risikoStats[$level])) {
                $risikoStats[$level] = $item['total'];
            }
        }

        $data = [
            'risikoStats' => $risikoStats,
            'latestRisiko' => array_slice($allRisiko, 0, 5)
        ];

        $this->view('dashboard/index', $data);
    }
}
?>