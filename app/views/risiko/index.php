<?php
// Risiko List view
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-9">
            <h2><i class="fas fa-exclamation-triangle"></i> Data Penilaian Risiko</h2>
            <p class="text-muted">Kelola data risiko teknologi informasi</p>
        </div>
        <div class="col-md-3 text-end">
            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                <a href="index.php?page=risiko&action=create" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Risiko
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="GET" class="row g-2" action="index.php">
                        <input type="hidden" name="page" value="risiko">

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="search" placeholder="Cari risiko..." value="<?php echo htmlspecialchars($search); ?>">
                        </div>

                        <div class="col-md-4">
                            <select class="form-control" name="level">
                                <option value="">Semua Level</option>
                                <option value="Extreme" <?php echo $level === 'Extreme' ? 'selected' : ''; ?>>Extreme</option>
                                <option value="High" <?php echo $level === 'High' ? 'selected' : ''; ?>>High</option>
                                <option value="Medium" <?php echo $level === 'Medium' ? 'selected' : ''; ?>>Medium</option>
                                <option value="Low" <?php echo $level === 'Low' ? 'selected' : ''; ?>>Low</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search"></i> Filter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MATRKS RISIKO -->
    <div class="row mb-4">
        <div class="col-md-12">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        <i class="fas fa-th"></i>
                        Matriks Risiko
                    </h5>
                </div>

                <div class="card-body">

                    <div class="d-flex align-items-center gap-4 flex-wrap">

                        <!-- TEXT VERTICAL -->
                        <div class="vertical-text">
                            L I K E L I H O O D
                        </div>

                        <!-- MATRIX -->
                        <div class="table-responsive">

                            <table class="table border-0 text-center align-middle matrix-table">

                                <tbody>

                                    <?php
                                    $likelihoodLabel = [
                                        5 => 'Certain',
                                        4 => 'Likely',
                                        3 => 'Possible',
                                        2 => 'Unlikely',
                                        1 => 'Rare'
                                    ];

                                    $impactLabel = [
                                        1 => 'Insignificant',
                                        2 => 'Minor',
                                        3 => 'Moderate',
                                        4 => 'Major',
                                        5 => 'Catastrophic'
                                    ];
                                    ?>

                                    <!-- MATRIX -->
                                    <?php for ($l = 5; $l >= 1; $l--): ?>

                                        <tr>

                                            <!-- LABEL LIKELIHOOD -->
                                            <td class="border-0 pe-3 text-end">
                                                <div class="fw-bold">
                                                    <?php echo $likelihoodLabel[$l]; ?>
                                                </div>

                                                <small class="text-muted">
                                                    <?php echo $l; ?>
                                                </small>
                                            </td>

                                            <?php for ($i = 1; $i <= 5; $i++): ?>

                                                <?php
                                                $score = $l * $i;

                                                // warna level
                                                if ($score >= 15) {
                                                    $bg = '#d90429';
                                                    $text = 'white';
                                                } elseif ($score >= 5) {
                                                    $bg = '#e9b44c';
                                                    $text = 'black';
                                                } else {
                                                    $bg = '#20bf55';
                                                    $text = 'white';
                                                }

                                                // ambil risk id dari database
                                                $riskIds = [];

                                                foreach ($risikoList as $r) {

                                                    if (
                                                        $r['likelihood'] == $l &&
                                                        $r['impact'] == $i
                                                    ) {

                                                        $riskIds[] = $r['risk_id'];
                                                    }
                                                }
                                                ?>

                                                <td class="border-0 p-2">

                                                    <div class="matrix-box"
                                                        style="
                                                        background: <?php echo $bg; ?>;
                                                        color: <?php echo $text; ?>;
                                                    ">

                                                        <!-- RISK ID -->
                                                        <?php if (!empty($riskIds)): ?>

                                                            <?php foreach ($riskIds as $id): ?>

                                                                <div class="risk-id">
                                                                    <?php echo $id; ?>
                                                                </div>

                                                            <?php endforeach; ?>

                                                        <?php endif; ?>

                                                    </div>

                                                </td>

                                            <?php endfor; ?>

                                        </tr>

                                    <?php endfor; ?>

                                    <!-- IMPACT -->
                                    <tr>

                                        <td class="border-0"></td>

                                        <?php for ($i = 1; $i <= 5; $i++): ?>

                                            <td class="border-0 text-center">

                                                <div class="fw-bold">
                                                    <?php echo $i; ?>
                                                </div>

                                                <small class="text-muted">
                                                    <?php echo $impactLabel[$i]; ?>
                                                </small>

                                            </td>

                                        <?php endfor; ?>

                                    </tr>

                                    <tr>

                                        <td class="border-0"></td>

                                        <td colspan="5" class="border-0 text-center pt-3">

                                            <div class="impact-text">
                                                C O N S E Q U E N C E
                                            </div>

                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>

                        <!-- KETERANGAN -->
                        <div>

                            <div class="mb-3 d-flex align-items-center gap-2">
                                <div class="legend-dot bg-success"></div>
                                <small>Low: 1-4</small>
                            </div>

                            <div class="mb-3 d-flex align-items-center gap-2">
                                <div class="legend-dot bg-warning"></div>
                                <small>Medium: 5-9</small>
                            </div>

                            <div class="mb-3 d-flex align-items-center gap-2">
                                <div class="legend-dot bg-danger"></div>
                                <small>High: 10-16</small>
                            </div>

                            
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <style>
        .matrix-table {
            border-collapse: separate;
            border-spacing: 1px;
        }

        .matrix-box {

            width: 65px;
            height: 50px;

            border-radius: 8px;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            font-weight: bold;

            transition: 0.2s;
        }

        .matrix-box:hover {
            transform: scale(1.05);
        }

        .risk-id {
            font-size: 11px;
            line-height: 14px;
        }

        .vertical-text {

            writing-mode: vertical-rl;
            transform: rotate(180deg);

            font-weight: bold;
            letter-spacing: 5px;

            font-size: 14px;
        }

        .impact-text {
            letter-spacing: 8px;
            font-weight: bold;
            font-size: 14px;
        }

        .legend-dot {

            width: 15px;
            height: 15px;

            border-radius: 50%;
        }
    </style>

    <!-- Data Table -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table"></i> Daftar Risiko
                </div>
                <div class="card-body p-0">
                    <?php if (!empty($risikoList)): ?>
                        <table class="table table-hover mb-0" style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th width="5%">Risk ID</th>
                                    <th width="10%">Nama Risiko</th>
                                    <th width="12%">Aset</th>
                                    <th width="5%">L</th>
                                    <th width="5%">C</th>
                                    <th width="5%">Score</th>
                                    <th width="5%">Level</th>
                                    <th width="18%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($risikoList as $risiko): ?>
                                    <tr>
                                        <td>
                                            <span class="badge bg-dark">
                                                <?php echo $risiko['risk_id']; ?>
                                            </span>
                                        </td>
                                        <td><?php echo $risiko['nama_risiko']; ?></td>
                                        <td><?php echo $risiko['aset']; ?></td>
                                        <td>
                                            <span class="badge bg-secondary"><?php echo $risiko['likelihood']; ?></span>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary"><?php echo $risiko['impact']; ?></span>
                                        </td>
                                        <td>
                                            <strong class="text-danger"><?php echo $risiko['risk_score']; ?></strong>
                                        </td>
                                        <td>
                                            <?php
                                            $badgeClass = 'badge-' . strtolower($risiko['level_risiko']);
                                            ?>
                                            <span class="badge <?php echo $badgeClass; ?>">
                                                <?php echo $risiko['level_risiko']; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#risikoModal<?php echo $risiko['id']; ?>">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                                                <a href="index.php?page=risiko&action=edit&id=<?php echo $risiko['id']; ?>" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="index.php?page=risiko&action=delete&id=<?php echo $risiko['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="p-4 text-center text-muted">
                            <i class="fas fa-inbox" style="font-size: 48px; opacity: 0.3;"></i>
                            <p>Tidak ada data risiko</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals Container -->
    <?php if (!empty($risikoList)): ?>
        <?php foreach ($risikoList as $risiko): ?>
            <!-- Modal Detail Risiko -->
            <div class="modal fade" id="risikoModal<?php echo $risiko['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="risikoModalLabel<?php echo $risiko['id']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="risikoModalLabel<?php echo $risiko['id']; ?>"><?php echo $risiko['nama_risiko']; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Aset:</strong> <?php echo $risiko['aset']; ?></p>
                            <p><strong>Deskripsi:</strong> <?php echo $risiko['deskripsi']; ?></p>
                            <p><strong>Likelihood:</strong> <?php echo $risiko['likelihood']; ?>/5</p>
                            <p><strong>Impact:</strong> <?php echo $risiko['impact']; ?>/5</p>
                            <p><strong>Risk Score:</strong> <?php echo $risiko['risk_score']; ?></p>
                            <p><strong>Level Risiko:</strong> <span class="badge badge-<?php echo strtolower($risiko['level_risiko']); ?>"><?php echo $risiko['level_risiko']; ?></span></p>
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