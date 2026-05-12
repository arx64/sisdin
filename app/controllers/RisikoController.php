<?php
/**
 * Risiko Controller
 */
class RisikoController extends Controller {
    private $risikoModel;

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
        require_once __DIR__ . '/../models/Risiko.php';
        $this->risikoModel = new Risiko();
    }

    /**
     * Show risiko list
     */
    public function index() {
        $search = $_GET['search'] ?? '';
        $level = $_GET['level'] ?? '';

        if (!empty($search)) {
            $risikList = $this->risikoModel->search($search);
        } elseif (!empty($level)) {
            $risikList = $this->risikoModel->getByLevel($level);
        } else {
            $risikList = $this->risikoModel->getAll();
        }

        $flash = $this->getFlash();
        $data = [
            'risikoList' => $risikList,
            'search' => $search,
            'level' => $level,
            'flash' => $flash
        ];

        $this->view('risiko/index', $data);
    }

    /**
     * Show risiko create form
     */
    public function create() {
        $this->checkAdmin();

        $flash = $this->getFlash();
        $data = [
            'flash' => $flash
        ];

        $this->view('risiko/create', $data);
    }

    /**
     * Store risiko
     */
    public function store() {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_risiko = $_POST['nama_risiko'] ?? '';
            $aset = $_POST['aset'] ?? '';
            $deskripsi = $_POST['deskripsi'] ?? '';
            $likelihood = $_POST['likelihood'] ?? 1;
            $impact = $_POST['impact'] ?? 1;

            if (empty($nama_risiko) || empty($aset) || empty($deskripsi)) {
                $this->setFlash('danger', 'Semua field harus diisi');
                $this->redirect('risiko&action=create');
            }

            $data = [
                'nama_risiko' => $nama_risiko,
                'aset' => $aset,
                'deskripsi' => $deskripsi,
                'likelihood' => $likelihood,
                'impact' => $impact
            ];

            $result = $this->risikoModel->createRisiko($data);

            if ($result) {
                $this->setFlash('success', 'Risiko berhasil ditambahkan');
            } else {
                $this->setFlash('danger', 'Gagal menambahkan risiko');
            }

            $this->redirect('risiko');
        }
    }

    /**
     * Show edit form
     */
    public function edit() {
        $this->checkAdmin();

        $id = $_GET['id'] ?? null;
        if (!$id) {
            $this->redirect('risiko');
        }

        $risiko = $this->risikoModel->getById($id);
        if (!$risiko) {
            $this->redirect('risiko');
        }

        $flash = $this->getFlash();
        $data = [
            'risiko' => $risiko,
            'flash' => $flash
        ];

        $this->view('risiko/edit', $data);
    }

    /**
     * Update risiko
     */
    public function update() {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $nama_risiko = $_POST['nama_risiko'] ?? '';
            $aset = $_POST['aset'] ?? '';
            $deskripsi = $_POST['deskripsi'] ?? '';
            $likelihood = $_POST['likelihood'] ?? 1;
            $impact = $_POST['impact'] ?? 1;

            if (!$id || empty($nama_risiko) || empty($aset) || empty($deskripsi)) {
                $this->setFlash('danger', 'Semua field harus diisi');
                $this->redirect('risiko&action=edit&id=' . $id);
            }

            $data = [
                'nama_risiko' => $nama_risiko,
                'aset' => $aset,
                'deskripsi' => $deskripsi,
                'likelihood' => $likelihood,
                'impact' => $impact
            ];

            $result = $this->risikoModel->updateRisiko($id, $data);

            if ($result) {
                $this->setFlash('success', 'Risiko berhasil diperbarui');
            } else {
                $this->setFlash('danger', 'Gagal memperbarui risiko');
            }

            $this->redirect('risiko');
        }
    }

    /**
     * Delete risiko
     */
    public function delete() {
        $this->checkAdmin();

        $id = $_GET['id'] ?? null;
        if (!$id) {
            $this->redirect('risiko');
        }

        $result = $this->risikoModel->delete($id);

        if ($result) {
            $this->setFlash('success', 'Risiko berhasil dihapus');
        } else {
            $this->setFlash('danger', 'Gagal menghapus risiko');
        }

        $this->redirect('risiko');
    }
}
?>