<?php
// Rekomendasi view
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2><i class="fas fa-lightbulb"></i> Rekomendasi Mitigasi Risiko</h2>
            <p class="text-muted">Rekomendasi penanganan risiko berdasarkan level risiko</p>
        </div>

        <div class="col-md-6 text-end">
            <a href="index.php?page=rekomendasi&action=cetak" target="_blank" class="btn btn-danger">
                <i class="fas fa-file-pdf"></i> Cetak PDF
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list"></i> Daftar Rekomendasi
                </div>
                <div class="card-body p-0">
                    <?php if (!empty($rekomendasi)): ?>
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th width="15%">Level Risiko</th>
                                    <th width="50%">Solusi / Rekomendasi</th>
                                    <th width="20%">Jumlah Risiko</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rekomendasi as $rekom): ?>
                                    <tr>
                                        <td>
                                            <?php
                                            $badgeClass = 'badge-' . strtolower($rekom['level_risiko']);
                                            ?>
                                            <span class="badge <?php echo $badgeClass; ?>">
                                                <?php echo $rekom['level_risiko']; ?>
                                            </span>
                                        </td>
                                        <td><?php echo $rekom['solusi']; ?></td>
                                        <td>
                                            <span class="badge bg-secondary"><?php echo $rekom['jumlah_risiko']; ?> risiko</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#rekomModal<?php echo $rekom['id']; ?>">
                                                <i class="fas fa-eye"></i> Lihat Detail
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="p-4 text-center text-muted">
                            <i class="fas fa-inbox" style="font-size: 48px; opacity: 0.3;"></i>
                            <p>Belum ada rekomendasi</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals Container -->
    <?php if (!empty($rekomendasi)): ?>
        <?php foreach ($rekomendasi as $rekom): ?>
            <?php $badgeClass = 'badge-' . strtolower($rekom['level_risiko']); ?>
            <!-- Modal -->
            <div class="modal fade" id="rekomModal<?php echo $rekom['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="rekomModalLabel<?php echo $rekom['id']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="rekomModalLabel<?php echo $rekom['id']; ?>">
                                Rekomendasi: <span class="badge <?php echo $badgeClass; ?>"><?php echo $rekom['level_risiko']; ?></span>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Solusi:</strong></p>
                            <p><?php echo $rekom['solusi']; ?></p>
                            <p><strong>Jumlah Risiko Aktif:</strong> <?php echo $rekom['jumlah_risiko']; ?></p>
                            <p><strong>Pengertian Level <?php echo $rekom['level_risiko']; ?>:</strong></p>
                            <?php
                            switch ($rekom['level_risiko']) {
                                case 'Extreme':
                                    echo '<p>Risiko ekstrem memerlukan tindakan mitigasi segera dengan alokasi sumber daya maksimal.</p>';
                                    break;
                                case 'High':
                                    echo '<p>Risiko tinggi memerlukan mitigasi dalam jangka pendek dengan rencana implementasi.</p>';
                                    break;
                                case 'Medium':
                                    echo '<p>Risiko sedang dapat dimonitor atau dimitigasi sesuai dengan prioritas bisnis.</p>';
                                    break;
                                case 'Low':
                                    echo '<p>Risiko rendah dapat diterima dan dimonitor secara berkala.</p>';
                                    break;
                            }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Rekomendasi Guideline -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-book"></i> Panduan Rekomendasi Mitigasi Risiko
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6><span class="badge badge-extreme">EXTREME</span> (Score 17-25)</h6>
                            <ul>
                                <li>Implementasi backup data otomatis</li>
                                <li>Disaster recovery plan</li>
                                <li>Business continuity plan</li>
                                <li>Monitoring 24/7 sistem kritis</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6><span class="badge badge-high">HIGH</span> (Score 10-16)</h6>
                            <ul>
                                <li>Update sistem keamanan</li>
                                <li>Monitoring jaringan aktif</li>
                                <li>Audit keamanan berkala</li>
                                <li>Maintenance sistem terjadwal</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6><span class="badge badge-medium">MEDIUM</span> (Score 5-9)</h6>
                            <ul>
                                <li>Update software berkala</li>
                                <li>Backup data mingguan</li>
                                <li>Monitoring sistem berkala</li>
                                <li>Pelatihan user tentang keamanan</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6><span class="badge badge-low">LOW</span> (Score 1-4)</h6>
                            <ul>
                                <li>Monitoring sistem rutin</li>
                                <li>Update sistem berkala</li>
                                <li>Dokumentasi prosedur</li>
                                <li>Pelaporan berkala</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>