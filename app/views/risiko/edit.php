<?php
// Risiko Edit view
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="fas fa-edit"></i> Edit Risiko</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-file-alt"></i> Form Edit Risiko
                </div>
                <div class="card-body">
                    <form method="POST" action="index.php?page=risiko&action=update">
                        <input type="hidden" name="id" value="<?php echo $risiko['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label">Nama Risiko *</label>
                            <input type="text" class="form-control" name="nama_risiko" value="<?php echo $risiko['nama_risiko']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Aset *</label>
                            <input type="text" class="form-control" name="aset" value="<?php echo $risiko['aset']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi *</label>
                            <textarea class="form-control" name="deskripsi" rows="4" required><?php echo $risiko['deskripsi']; ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Likelihood (1-5) *</label>
                                    <select class="form-control" name="likelihood" required>
                                        <option value="1" <?php echo $risiko['likelihood'] == 1 ? 'selected' : ''; ?>>1 - Sangat Jarang</option>
                                        <option value="2" <?php echo $risiko['likelihood'] == 2 ? 'selected' : ''; ?>>2 - Jarang</option>
                                        <option value="3" <?php echo $risiko['likelihood'] == 3 ? 'selected' : ''; ?>>3 - Sedang</option>
                                        <option value="4" <?php echo $risiko['likelihood'] == 4 ? 'selected' : ''; ?>>4 - Sering</option>
                                        <option value="5" <?php echo $risiko['likelihood'] == 5 ? 'selected' : ''; ?>>5 - Sangat Sering</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Impact (1-5) *</label>
                                    <select class="form-control" name="impact" required>
                                        <option value="1" <?php echo $risiko['impact'] == 1 ? 'selected' : ''; ?>>1 - Sangat Kecil</option>
                                        <option value="2" <?php echo $risiko['impact'] == 2 ? 'selected' : ''; ?>>2 - Kecil</option>
                                        <option value="3" <?php echo $risiko['impact'] == 3 ? 'selected' : ''; ?>>3 - Sedang</option>
                                        <option value="4" <?php echo $risiko['impact'] == 4 ? 'selected' : ''; ?>>4 - Besar</option>
                                        <option value="5" <?php echo $risiko['impact'] == 5 ? 'selected' : ''; ?>>5 - Sangat Besar</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <strong>Current Risk Score:</strong> <?php echo $risiko['risk_score']; ?> (Level: <?php echo $risiko['level_risiko']; ?>)
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
                </div>
            </div>
        </div>
    </div>
</div>