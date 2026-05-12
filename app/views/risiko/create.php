<?php
// Risiko Create view
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="fas fa-plus"></i> Tambah Risiko Baru</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-file-alt"></i> Form Input Risiko
                </div>
                <div class="card-body">
                    <form method="POST" action="index.php?page=risiko&action=store">
                        <div class="mb-3">
                            <label class="form-label">Nama Risiko *</label>
                            <input type="text" class="form-control" name="nama_risiko" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Aset *</label>
                            <input type="text" class="form-control" name="aset" placeholder="e.g., Server, Database, Network" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi *</label>
                            <textarea class="form-control" name="deskripsi" rows="4" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Likelihood (1-5) *</label>
                                    <select class="form-control" name="likelihood" required>
                                        <option value="1">1 - Sangat Jarang</option>
                                        <option value="2">2 - Jarang</option>
                                        <option value="3">3 - Sedang</option>
                                        <option value="4">4 - Sering</option>
                                        <option value="5">5 - Sangat Sering</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Impact (1-5) *</label>
                                    <select class="form-control" name="impact" required>
                                        <option value="1">1 - Sangat Kecil</option>
                                        <option value="2">2 - Kecil</option>
                                        <option value="3">3 - Sedang</option>
                                        <option value="4">4 - Besar</option>
                                        <option value="5">5 - Sangat Besar</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="index.php?page=risiko" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i> Panduan Risk Score
                </div>
                <div class="card-body">
                    <p><strong>Formula:</strong></p>
                    <p style="text-align: center; font-size: 18px;">
                        Risk Score = Likelihood × Impact
                    </p>

                    <hr>

                    <p><strong>Risk Level:</strong></p>
                    <p><span class="badge badge-low">Low</span> : 1-4</p>
                    <p><span class="badge badge-medium">Medium</span> : 5-9</p>
                    <p><span class="badge badge-high">High</span> : 10-16</p>
                    <p><span class="badge badge-extreme">Extreme</span> : 17-25</p>

                    <hr>

                    <p><strong>Contoh:</strong></p>
                    <p>Likelihood = 3<br>Impact = 4<br>Score = 3 × 4 = <strong>12</strong><br>Level = <span class="badge badge-high">High</span></p>
                </div>
            </div>
        </div>
    </div>
</div>