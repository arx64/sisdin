<?php
/**
 * Kontrol Controller
 */
class KontrolController extends Controller {
    private $kontrolModel;

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
        require_once __DIR__ . '/../models/Kontrol.php';
        $this->kontrolModel = new Kontrol();
    }

    /**
     * Show semua kontrol
     */
    public function index() {
        $kontrolList = $this->kontrolModel->getAll();
        $flash = $this->getFlash();

        $data = [
            'kontrolList' => $kontrolList,
            'flash' => $flash
        ];

        $this->view('kontrol/index', $data);
    }

    /**
     * Tampilkan form create
     */
    public function create() {
        $this->checkAdmin();

        $flash = $this->getFlash();
        $data = [
            'flash' => $flash
        ];

        $this->view('kontrol/create', $data);
    }

    /**
     * Simpan kontrol baru
     */
    public function store() {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $risk_id = trim($_POST['risk_id'] ?? '');
            $aspek = trim($_POST['aspek'] ?? '');
            $judul_kontrol = trim($_POST['judul_kontrol'] ?? '');
            $deskripsi = trim($_POST['deskripsi'] ?? '');
            $dokumen_terkait = trim($_POST['dokumen_terkait'] ?? '');

            if (empty($risk_id) || empty($aspek) || empty($judul_kontrol) || empty($deskripsi) || empty($dokumen_terkait)) {
                $this->setFlash('danger', 'Semua field harus diisi.');
                header('Location: index.php?page=kontrol&action=create');
                exit;
            }

            $data = [
                'risk_id' => $risk_id,
                'aspek' => $aspek,
                'judul_kontrol' => $judul_kontrol,
                'deskripsi' => $deskripsi,
                'dokumen_terkait' => $dokumen_terkait
            ];

            $result = $this->kontrolModel->create($data);
            if ($result) {
                $this->setFlash('success', 'Kontrol berhasil ditambahkan.');
            } else {
                $this->setFlash('danger', 'Gagal menambahkan kontrol.');
            }

            header('Location: index.php?page=kontrol');
            exit;
        }
    }

    /**
     * Tampilkan form edit
     */
    public function edit() {
        $this->checkAdmin();

        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        if (!$id) {
            header('Location: index.php?page=kontrol');
            exit;
        }

        $kontrol = $this->kontrolModel->getById($id);
        if (!$kontrol) {
            header('Location: index.php?page=kontrol');
            exit;
        }

        $flash = $this->getFlash();
        $data = [
            'kontrol' => $kontrol,
            'flash' => $flash
        ];

        $this->view('kontrol/edit', $data);
    }

    /**
     * Update kontrol
     */
    public function update() {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
            $risk_id = trim($_POST['risk_id'] ?? '');
            $aspek = trim($_POST['aspek'] ?? '');
            $judul_kontrol = trim($_POST['judul_kontrol'] ?? '');
            $deskripsi = trim($_POST['deskripsi'] ?? '');
            $dokumen_terkait = trim($_POST['dokumen_terkait'] ?? '');

            if (!$id || empty($risk_id) || empty($aspek) || empty($judul_kontrol) || empty($deskripsi) || empty($dokumen_terkait)) {
                $this->setFlash('danger', 'Semua field harus diisi.');
                header('Location: index.php?page=kontrol&action=edit&id=' . $id);
                exit;
            }

            $data = [
                'risk_id' => $risk_id,
                'aspek' => $aspek,
                'judul_kontrol' => $judul_kontrol,
                'deskripsi' => $deskripsi,
                'dokumen_terkait' => $dokumen_terkait
            ];

            $result = $this->kontrolModel->updateData($id, $data);
            if ($result) {
                $this->setFlash('success', 'Kontrol berhasil diperbarui.');
            } else {
                $this->setFlash('danger', 'Gagal memperbarui kontrol.');
            }

            header('Location: index.php?page=kontrol');
            exit;
        }
    }

    /**
     * Hapus kontrol
     */
    public function delete() {
        $this->checkAdmin();

        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        if (!$id) {
            header('Location: index.php?page=kontrol');
            exit;
        }

        $result = $this->kontrolModel->deleteData($id);
        if ($result) {
            $this->setFlash('success', 'Kontrol berhasil dihapus.');
        } else {
            $this->setFlash('danger', 'Gagal menghapus kontrol.');
        }

        header('Location: index.php?page=kontrol');
        exit;
    }
}
?>