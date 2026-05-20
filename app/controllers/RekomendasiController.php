<?php
/**
 * Rekomendasi Controller
 */
class RekomendasiController extends Controller {
    private $rekomendasiModel;
    private $risikoModel;

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
        require_once __DIR__ . '/../models/Rekomendasi.php';
        require_once __DIR__ . '/../models/Risiko.php';
        $this->rekomendasiModel = new Rekomendasi();
        $this->risikoModel = new Risiko();
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

    /**
     * Cetak PDF rekomendasi
     */
    public function cetak()
    {
        $risikoList = $this->risikoModel->getAllOrdered();
        $rekomendasiList = $this->rekomendasiModel->getAll();
        $rekomendasiMap = [];

        foreach ($rekomendasiList as $item) {
            $rekomendasiMap[$item['level_risiko']] = $item['solusi'];
        }

        $data = [
            'risikoList' => $risikoList,
            'rekomendasiMap' => $rekomendasiMap
        ];

        // Render halaman cetak tanpa layout, karena view cetak sudah berisi seluruh dokumen HTML
        $this->viewRaw('rekomendasi/cetak', $data);
    }
}
?>