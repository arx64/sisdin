<?php
// Kontrol List view
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-9">
            <h2><i class="fas fa-shield-alt"></i> Penetapan Kontrol</h2>
            <p class="text-muted">Kelola kontrol mitigasi risiko untuk implementasi COBIT 2019 APO12 dan APO13.</p>
        </div>
        <div class="col-md-3 text-end">
            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                <a href="index.php?page=kontrol&action=create" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Kontrol
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-list"></i> Daftar Kontrol</h5>
                </div>
                <div class="card-body">
                    <?php if (!empty($kontrolList)): ?>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 align-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Risk ID</th>
                                        <th>Aspek</th>
                                        <th>Judul Kontrol</th>
                                        <th>Deskripsi</th>
                                        <th>Dokumen Terkait</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($kontrolList as $kontrol): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo htmlspecialchars($kontrol['risk_id']); ?></td>
                                            <td><?php echo htmlspecialchars($kontrol['aspek']); ?></td>
                                            <td><?php echo htmlspecialchars($kontrol['judul_kontrol']); ?></td>
                                            <td><?php echo nl2br(htmlspecialchars($kontrol['deskripsi'])); ?></td>
                                            <td><?php echo nl2br(htmlspecialchars($kontrol['dokumen_terkait'])); ?></td>
                                            <td>
                                                <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                                                    <a href="index.php?page=kontrol&action=edit&id=<?php echo $kontrol['id']; ?>" class="btn btn-sm btn-warning mb-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="index.php?page=kontrol&action=delete&id=<?php echo $kontrol['id']; ?>" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Yakin ingin menghapus kontrol ini?');">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <span class="text-muted">Tidak ada aksi</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="p-4 text-center text-muted">
                            <i class="fas fa-inbox" style="font-size: 48px; opacity: 0.3;"></i>
                            <p>Belum ada data kontrol.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>