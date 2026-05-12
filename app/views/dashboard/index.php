<?php
// Dashboard view - hanya output content untuk dirender dengan layout
?>

<div class="container-fluid">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-card">
                <div class="welcome-content">
                    <div class="welcome-text">
                        <h2><i class="fas fa-chart-line"></i> Selamat Datang di Dashboard</h2>
                        <p>Monitor dan kelola risiko TI dengan framework COBIT 2019</p>
                    </div>
                    <div class="welcome-stats">
                        <div class="stat-item">
                            <div class="stat-number"><?php echo $risikoStats['total']; ?></div>
                            <div class="stat-label">Total Risiko</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number"><?php echo $risikoStats['extreme'] + $risikoStats['high']; ?></div>
                            <div class="stat-label">Perlu Perhatian</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Risk Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card risk-extreme">
                <div class="stat-icon">
                    <i class="fas fa-fire"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $risikoStats['extreme']; ?></h3>
                    <p>Risiko Extreme</p>
                    <div class="progress-bar">
                        <div class="progress-fill extreme" style="width: <?php echo $risikoStats['total'] > 0 ? ($risikoStats['extreme'] / $risikoStats['total'] * 100) : 0; ?>%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card risk-high">
                <div class="stat-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $risikoStats['high']; ?></h3>
                    <p>Risiko High</p>
                    <div class="progress-bar">
                        <div class="progress-fill high" style="width: <?php echo $risikoStats['total'] > 0 ? ($risikoStats['high'] / $risikoStats['total'] * 100) : 0; ?>%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card risk-medium">
                <div class="stat-icon">
                    <i class="fas fa-minus-circle"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $risikoStats['medium']; ?></h3>
                    <p>Risiko Medium</p>
                    <div class="progress-bar">
                        <div class="progress-fill medium" style="width: <?php echo $risikoStats['total'] > 0 ? ($risikoStats['medium'] / $risikoStats['total'] * 100) : 0; ?>%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card risk-low">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $risikoStats['low']; ?></h3>
                    <p>Risiko Low</p>
                    <div class="progress-bar">
                        <div class="progress-fill low" style="width: <?php echo $risikoStats['total'] > 0 ? ($risikoStats['low'] / $risikoStats['total'] * 100) : 0; ?>%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Recent Activity -->
    <div class="row mb-4">
        <!-- Risk Distribution Chart -->
        <div class="col-lg-8 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-chart-pie"></i> Distribusi Risiko
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="riskChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-bolt"></i> Quick Actions
                </div>
                <div class="card-body">
                    <div class="action-buttons">
                        <a href="index.php?page=risiko&action=create" class="action-btn primary">
                            <i class="fas fa-plus"></i>
                            <span>Tambah Risiko</span>
                        </a>
                        <a href="index.php?page=design-factor" class="action-btn secondary">
                            <i class="fas fa-cogs"></i>
                            <span>Design Factor</span>
                        </a>
                        <a href="index.php?page=rekomendasi" class="action-btn success">
                            <i class="fas fa-lightbulb"></i>
                            <span>Rekomendasi</span>
                        </a>
                        <a href="index.php?page=framework" class="action-btn info">
                            <i class="fas fa-cube"></i>
                            <span>Framework</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Risk Records -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-list"></i> Risiko Terbaru</span>
                    <a href="index.php?page=risiko" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i> Lihat Semua
                    </a>
                </div>
                <div class="card-body p-0">
                    <?php if (!empty($latestRisiko)): ?>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="25%">Nama Risiko</th>
                                        <th width="15%">Aset</th>
                                        <th width="10%">Likelihood</th>
                                        <th width="10%">Impact</th>
                                        <th width="10%">Score</th>
                                        <th width="15%">Level</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($latestRisiko as $risiko): ?>
                                        <tr>
                                            <td>
                                                <span class="badge badge-secondary">#<?php echo $risiko['id']; ?></span>
                                            </td>
                                            <td>
                                                <strong><?php echo htmlspecialchars($risiko['nama_risiko']); ?></strong>
                                            </td>
                                            <td><?php echo htmlspecialchars($risiko['aset']); ?></td>
                                            <td>
                                                <span class="badge bg-light text-dark"><?php echo $risiko['likelihood']; ?></span>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-dark"><?php echo $risiko['impact']; ?></span>
                                            </td>
                                            <td>
                                                <strong class="text-primary"><?php echo $risiko['risk_score']; ?></strong>
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
                                                <a href="index.php?page=risiko&action=edit&id=<?php echo $risiko['id']; ?>" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-inbox"></i>
                            </div>
                            <h4>Belum ada data risiko</h4>
                            <p>Mulai dengan menambahkan risiko pertama Anda</p>
                            <a href="index.php?page=risiko&action=create" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah Risiko Pertama
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Cards -->
    <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <div class="card info-card">
                <div class="card-body">
                    <div class="info-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h5>Tentang Sistem</h5>
                    <p><strong>Sistem:</strong> Analisis Manajemen Risiko TI berbasis COBIT 2019</p>
                    <p><strong>Organisasi:</strong> Rumah Makan Ayam Jingkrak TOB</p>
                    <p><strong>Focus:</strong></p>
                    <ul class="info-list">
                        <li><i class="fas fa-check"></i> APO12 - Manage Risk</li>
                        <li><i class="fas fa-check"></i> APO13 - Manage Security</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card info-card">
                <div class="card-body">
                    <div class="info-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h5>Dokumentasi Risk Level</h5>
                    <div class="risk-levels">
                        <div class="risk-level extreme">
                            <span class="level-badge">Extreme</span>
                            <span class="level-desc">Score 17-25 (Tindakan Segera)</span>
                        </div>
                        <div class="risk-level high">
                            <span class="level-badge">High</span>
                            <span class="level-desc">Score 10-16 (Mitigasi Cepat)</span>
                        </div>
                        <div class="risk-level medium">
                            <span class="level-badge">Medium</span>
                            <span class="level-desc">Score 5-9 (Monitor)</span>
                        </div>
                        <div class="risk-level low">
                            <span class="level-badge">Low</span>
                            <span class="level-desc">Score 1-4 (Diterima)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.welcome-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 16px;
    padding: 30px;
    color: white;
    box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
    margin-bottom: 30px;
}

.welcome-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 30px;
}

.welcome-text h2 {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.welcome-text p {
    font-size: 16px;
    opacity: 0.9;
    margin: 0;
}

.welcome-stats {
    display: flex;
    gap: 30px;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 4px;
}

.stat-label {
    font-size: 14px;
    opacity: 0.8;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-card {
    background: white;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    height: 100%;
    display: flex;
    align-items: center;
    gap: 20px;
}

.stat-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
}

.stat-card.risk-extreme {
    background: linear-gradient(135deg, #fff5f5 0%, #ffeaea 100%);
    border-left: 4px solid #ff6b9d;
}

.stat-card.risk-high {
    background: linear-gradient(135deg, #fff8e1 0%, #ffecb3 100%);
    border-left: 4px solid #feca57;
}

.stat-card.risk-medium {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    border-left: 4px solid #48dbfb;
}

.stat-card.risk-low {
    background: linear-gradient(135deg, #e8f5e8 0%, #c8e6c9 100%);
    border-left: 4px solid #48dbfb;
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.stat-card.risk-extreme .stat-icon {
    background: linear-gradient(135deg, #ff6b9d 0%, #c44569 100%);
    color: white;
}

.stat-card.risk-high .stat-icon {
    background: linear-gradient(135deg, #feca57 0%, #ff9f43 100%);
    color: white;
}

.stat-card.risk-medium .stat-icon {
    background: linear-gradient(135deg, #48dbfb 0%, #0abde3 100%);
    color: white;
}

.stat-card.risk-low .stat-icon {
    background: linear-gradient(135deg, #48dbfb 0%, #0abde3 100%);
    color: white;
}

.stat-content h3 {
    font-size: 32px;
    font-weight: 700;
    margin: 0 0 4px;
    color: #2c3e50;
}

.stat-content p {
    margin: 0 0 12px;
    color: #7f8c8d;
    font-weight: 500;
}

.progress-bar {
    height: 6px;
    background: rgba(0,0,0,0.1);
    border-radius: 3px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    border-radius: 3px;
    transition: width 0.8s ease;
}

.progress-fill.extreme { background: #ff6b9d; }
.progress-fill.high { background: #feca57; }
.progress-fill.medium { background: #48dbfb; }
.progress-fill.low { background: #48dbfb; }

.chart-container {
    position: relative;
    height: 300px;
}

.action-buttons {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

.action-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    padding: 20px 16px;
    border-radius: 12px;
    text-decoration: none;
    color: white;
    font-weight: 600;
    transition: all 0.3s ease;
    text-align: center;
    font-size: 14px;
}

.action-btn.primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.action-btn.secondary {
    background: linear-gradient(135deg, #a29bfe 0%, #6c5ce7 100%);
    box-shadow: 0 4px 15px rgba(162, 155, 254, 0.3);
}

.action-btn.success {
    background: linear-gradient(135deg, #00b894 0%, #00cec9 100%);
    box-shadow: 0 4px 15px rgba(0, 184, 148, 0.3);
}

.action-btn.info {
    background: linear-gradient(135deg, #fd79a8 0%, #e84393 100%);
    box-shadow: 0 4px 15px rgba(253, 121, 168, 0.3);
}

.action-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.action-btn i {
    font-size: 20px;
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #7f8c8d;
}

.empty-icon {
    font-size: 64px;
    margin-bottom: 20px;
    opacity: 0.3;
}

.empty-state h4 {
    margin-bottom: 10px;
    color: #2c3e50;
}

.info-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: none;
    height: 100%;
}

.info-card .card-body {
    padding: 30px;
}

.info-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    margin-bottom: 20px;
}

.info-card h5 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 16px;
}

.info-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.info-list li {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
    color: #555;
}

.info-list li i {
    color: #48dbfb;
    font-size: 12px;
}

.risk-levels {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.risk-level {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    border-radius: 8px;
    background: #f8f9fa;
}

.risk-level.extreme {
    background: linear-gradient(135deg, #fff5f5 0%, #ffeaea 100%);
    border-left: 3px solid #ff6b9d;
}

.risk-level.high {
    background: linear-gradient(135deg, #fff8e1 0%, #ffecb3 100%);
    border-left: 3px solid #feca57;
}

.risk-level.medium {
    background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
    border-left: 3px solid #48dbfb;
}

.risk-level.low {
    background: linear-gradient(135deg, #e8f5e8 0%, #c8e6c9 100%);
    border-left: 3px solid #48dbfb;
}

.level-badge {
    font-weight: 600;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 4px 8px;
    border-radius: 4px;
    color: white;
}

.risk-level.extreme .level-badge { background: #ff6b9d; }
.risk-level.high .level-badge { background: #feca57; color: #2c3e50; }
.risk-level.medium .level-badge { background: #48dbfb; }
.risk-level.low .level-badge { background: #48dbfb; }

.level-desc {
    font-size: 13px;
    color: #555;
    flex: 1;
}

@media (max-width: 768px) {
    .welcome-content {
        flex-direction: column;
        text-align: center;
        gap: 20px;
    }

    .welcome-stats {
        justify-content: center;
    }

    .stat-card {
        padding: 20px;
    }

    .stat-content h3 {
        font-size: 28px;
    }

    .action-buttons {
        grid-template-columns: 1fr;
    }

    .action-btn {
        padding: 16px;
        flex-direction: row;
        justify-content: flex-start;
        text-align: left;
    }

    .action-btn span {
        flex: 1;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Risk Distribution Chart
    const ctx = document.getElementById('riskChart').getContext('2d');
    const riskData = {
        labels: ['Extreme', 'High', 'Medium', 'Low'],
        datasets: [{
            data: [
                <?php echo $risikoStats['extreme']; ?>,
                <?php echo $risikoStats['high']; ?>,
                <?php echo $risikoStats['medium']; ?>,
                <?php echo $risikoStats['low']; ?>
            ],
            backgroundColor: [
                '#ff6b9d',
                '#feca57',
                '#48dbfb',
                '#00b894'
            ],
            borderColor: [
                '#c44569',
                '#ff9f43',
                '#0abde3',
                '#00cec9'
            ],
            borderWidth: 2
        }]
    };

    const chart = new Chart(ctx, {
        type: 'doughnut',
        data: riskData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });

    // Animate stat cards on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.stat-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
    });
});
</script>