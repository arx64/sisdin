<?php
// Design Factor view
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="fas fa-cogs"></i> Design Factor</h2>
            <p class="text-muted">Konfigurasi Faktor Desain untuk Analisis Risiko</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list"></i> Daftar Design Factor
                </div>
                <div class="card-body p-0">
                    <?php if (!empty($designFactors)): ?>
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th width="5%">Kode DF</th>
                                    <th width="20%">Nama DF</th>
                                    <th width="5%">DF Kasir</th>
                                    <th width="50%">Deskripsi</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($designFactors as $df): ?>
                                    <tr>
                                        <td>
                                            <strong><?php echo $df['kategori']; ?></strong>
                                        </td>
                                        <td>
                                            <?php echo $df['nama_df']; ?>
                                        </td>
                                        <td>
                                            <?php if ($df['df_kasir'] == 1): ?>
                                                <i class="fas fa-check text-success fs-4"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $df['deskripsi']; ?></td>
                                        <td>
                                            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                                                <a href="index.php?page=design-factor&action=edit&id=<?php echo $df['id']; ?>" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i> 
                                                </a>
                                            <?php endif; ?>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#dfModal<?php echo $df['id']; ?>">
                                                <i class="fas fa-eye"></i> 
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="p-4 text-center text-muted">
                            <i class="fas fa-inbox" style="font-size: 48px; opacity: 0.3;"></i>
                            <p>Belum ada design factor</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals Container -->
    <?php if (!empty($designFactors)): ?>
        <?php foreach ($designFactors as $df): ?>
            <!-- Modal Design Factor -->
            <div class="modal fade" id="dfModal<?php echo $df['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="dfModalLabel<?php echo $df['id']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dfModalLabel<?php echo $df['id']; ?>"><?php echo $df['kategori']; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><?php echo $df['deskripsi']; ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>