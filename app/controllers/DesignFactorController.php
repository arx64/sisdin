<?php
/**
 * Design Factor Controller
 */
class DesignFactorController extends Controller {
    private $dfModel;

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
        require_once __DIR__ . '/../models/DesignFactor.php';
        $this->dfModel = new DesignFactor();
    }

    /**
     * Show design factor list
     */
    public function index() {
        $designFactors = $this->dfModel->getAll();

        $data = [
            'designFactors' => $designFactors
        ];

        $this->view('design_factor/index', $data);
    }

    /**
     * Edit design factor
     */
    public function edit() {
        $this->checkAdmin();

        $id = $_GET['id'] ?? null;
        if (!$id) {
            $this->redirect('design-factor');
        }

        $df = $this->dfModel->getById($id);
        if (!$df) {
            $this->redirect('design-factor');
        }

        $flash = $this->getFlash();
        $data = [
            'df' => $df,
            'flash' => $flash
        ];

        $this->view('design_factor/edit', $data);
    }

    /**
     * Update design factor
     */
    public function update() {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $deskripsi = $_POST['deskripsi'] ?? '';

            if (!$id || empty($deskripsi)) {
                $this->setFlash('danger', 'Data tidak lengkap');
                $this->redirect('design-factor&action=edit&id=' . $id);
            }

            $result = $this->dfModel->updateValue($id, $deskripsi);

            if ($result) {
                $this->setFlash('success', 'Design Factor berhasil diperbarui');
            } else {
                $this->setFlash('danger', 'Gagal memperbarui Design Factor');
            }

            $this->redirect('design-factor');
        }
    }
}
?>