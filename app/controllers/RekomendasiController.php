<?php
/**
 * Rekomendasi Controller
 */
class RekomendasiController extends Controller {
    private $rekomendasiModel;

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
        require_once __DIR__ . '/../models/Rekomendasi.php';
        $this->rekomendasiModel = new Rekomendasi();
    }

    /**
     * Show rekomendasi list
     */
    public function index() {
        $rekomendasi = $this->rekomendasiModel->getAllWithRisiko();

        $flash = $this->getFlash();
        $data = [
            'rekomendasi' => $rekomendasi,
            'flash' => $flash
        ];

        $this->view('rekomendasi/index', $data);
    }

    /**
     * Show rekomendasi by level
     */
    public function byLevel() {
        $level = $_GET['level'] ?? 'High';
        $rekom = $this->rekomendasiModel->getByLevel($level);

        $data = [
            'level' => $level,
            'rekomendasi' => $rekom
        ];

        $this->view('rekomendasi/by_level', $data);
    }
}
?>