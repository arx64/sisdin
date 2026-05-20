<?php
// Kontrol Edit view
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="fas fa-edit"></i> Edit Kontrol</h2>
            <p class="text-muted">Perbarui kontrol mitigasi untuk mendukung implementasi COBIT 2019.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-file-alt"></i> Form Edit Kontrol</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="index.php?page=kontrol&action=update">
                        <input type="hidden" name="id" value="<?php echo $kontrol['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label">Risk ID *</label>
                            <input type="text" class="form-control" name="risk_id" value="<?php echo htmlspecialchars($kontrol['risk_id']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Aspek *</label>
                            <input type="text" class="form-control" name="aspek" value="<?php echo htmlspecialchars($kontrol['aspek']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul Kontrol *</label>
                            <input type="text" class="form-control" name="judul_kontrol" value="<?php echo htmlspecialchars($kontrol['judul_kontrol']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi *</label>
                            <textarea class="form-control" name="deskripsi" rows="5" required><?php echo htmlspecialchars($kontrol['deskripsi']); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dokumen Terkait *</label>
                            <textarea class="form-control" name="dokumen_terkait" rows="3" required><?php echo htmlspecialchars($kontrol['dokumen_terkait']); ?></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
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
                    <h5 class="mb-0"><i class="fas fa-lightbulb"></i> Catatan Akademik</h5>
                </div>
                <div class="card-body">
                    <p>Kontrol ini harus mendukung:</p>
                    <ul>
                        <li>Mitigasi risiko TI sesuai APO12.</li>
                        <li>Pengendalian keamanan dan akses sesuai APO13.</li>
                        <li>Monitoring operasional sistem kasir.</li>
                        <li>Perlindungan data transaksi dan hak akses.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>