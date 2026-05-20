<?php
// Kontrol Create view
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="fas fa-plus"></i> Tambah Kontrol Baru</h2>
            <p class="text-muted">Tambahkan kontrol baru untuk mendukung mitigasi risiko dan keamanan sistem kasir digital.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-file-alt"></i> Form Input Kontrol</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="index.php?page=kontrol&action=store">
                        <div class="mb-3">
                            <label class="form-label">Risk ID *</label>
                            <input type="text" class="form-control" name="risk_id" placeholder="Contoh: R6" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Aspek *</label>
                            <input type="text" class="form-control" name="aspek" placeholder="Contoh: Process & Technology" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul Kontrol *</label>
                            <input type="text" class="form-control" name="judul_kontrol" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi *</label>
                            <textarea class="form-control" name="deskripsi" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dokumen Terkait *</label>
                            <textarea class="form-control" name="dokumen_terkait" rows="3" required></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="index.php?page=kontrol" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-info-circle"></i> Panduan Kontrol</h5>
                </div>
                <div class="card-body">
                    <p>Gunakan kontrol berikut untuk mencerminkan penerapan COBIT 2019 pada risiko TI di Rumah Makan Ayam Jingkrak TOB.</p>
                    <ul>
                        <li><strong>APO12</strong> – Manage Risk: identifikasi, analisis, dan respon risiko.</li>
                        <li><strong>APO13</strong> – Manage Security: pengendalian keamanan dan proteksi data.</li>
                        <li>Isi data kontrol dengan dokumentasi yang mendukung proses, teknologi, dan sumber daya manusia.</li>
                        <li>Pastikan setiap kontrol mendukung mitigasi, monitoring, dan perlindungan transaksi.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>