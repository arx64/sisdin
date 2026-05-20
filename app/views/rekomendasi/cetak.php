<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>LAPORAN REKOMENDASI MITIGASI RISIKO TEKNOLOGI INFORMASI</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 25mm;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
            color: #1d1d1d;
            background: #fff;
        }

        body {
            padding: 20px 25px;
            font-size: 13px;
            line-height: 1.6;
        }

        .no-print {
            margin-bottom: 15px;
        }

        .header,
        .section {
            width: 100%;
            margin-bottom: 20px;
        }

        .report-title {
            text-align: center;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .report-subtitle {
            text-align: center;
            font-size: 13px;
            margin-bottom: 3px;
        }

        .report-meta {
            border: 1px solid #000;
            padding: 12px 14px;
            margin-top: 15px;
            font-size: 13px;
        }

        .report-meta strong {
            display: inline-block;
            width: 180px;
        }

        .small-text {
            font-size: 12px;
        }

        .section-title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .table-border {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table-border th,
        .table-border td {
            border: 1px solid #000;
            padding: 8px 10px;
            vertical-align: top;
        }

        .table-border th {
            background: #e8e8e8;
            font-weight: 700;
            text-align: left;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 3px;
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .extreme {
            background: #dc3545;
        }

        .high {
            background: #fd7e14;
        }

        .medium {
            background: #f1c40f;
            color: #000;
        }

        .low {
            background: #198754;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            border-top: 1px solid #000;
            padding-top: 10px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer .left,
        .footer .right {
            width: 48%;
        }

        .footer .right {
            text-align: right;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                padding: 0;
            }

            .footer {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>
    <div class="no-print">
        <button onclick="window.print()">Cetak PDF</button>
    </div>

    <div class="header">
        <div class="report-title">LAPORAN REKOMENDASI MITIGASI RISIKO TEKNOLOGI INFORMASI</div>
        <div class="report-subtitle">Framework COBIT 2019 – APO12 (Manage Risk) dan APO13 (Manage Security)</div>
        <div class="report-subtitle">Objek Penelitian: Rumah Makan Ayam Jingkrak TOB</div>
        <div class="report-subtitle"><?= date('d-m-Y H:i:s'); ?></div>
    </div>

    <div class="report-meta">
        <p><strong>Sistem yang dianalisis:</strong> Sistem Informasi Kasir Digital</p>
        <p><strong>Framework:</strong> COBIT 2019</p>
        <p><strong>Domain utama:</strong></p>
        <ul class="small-text" style="margin: 5px 0 10px 20px; padding: 0; list-style: disc;">
            <li>APO12 – Manage Risk</li>
            <li>APO13 – Manage Security</li>
        </ul>
        <p><strong>Design Factor:</strong></p>
        <ul class="small-text" style="margin: 5px 0 0 20px; padding: 0; list-style: disc;">
            <li>DF3 Risk Profile</li>
            <li>DF4 I&T Related Issues</li>
            <li>DF6 Role of IT</li>
            <li>DF10 Enterprise Size</li>
        </ul>
    </div>

    <div class="section">
        <div class="section-title">Tabel Rekomendasi Risiko</div>
        <table class="table-border">
            <thead>
                <tr>
                    <th style="width:4%;">Risk ID</th>
                    <th style="width:10%;">Nama Risiko</th>
                    <th style="width:8%;">Likelihood (L)</th>
                    <th style="width:9%;">Consequence (C)</th>
                    <th style="width:7%;">Nilai Risiko</th>
                    <th style="width:5%;">Level Risiko</th>
                    <th style="width:5%;">Strategi Penanganan</th>
                    <th>Rekomendasi Mitigasi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $strategyMap = [
                    'Extreme' => 'Mitigate',
                    'High' => 'Mitigate',
                    'Medium' => 'Transfer',
                    'Low' => 'Accept'
                ];
                // $no = 1;
                if (!empty($risikoList)):
                    foreach ($risikoList as $risk):
                        $riskId = $risk['risk_id'];
                        $level = $risk['level_risiko'];
                        $strategy = $strategyMap[$level] ?? 'Mitigate';
                        $mitigation = isset($rekomendasiMap[$level]) ? $rekomendasiMap[$level] : 'Rekomendasi mitigasi belum tersedia.';
                ?>
                        <tr>
                            <td><?= htmlspecialchars($riskId); ?></td>
                            <td><?= htmlspecialchars($risk['nama_risiko']); ?></td>
                            <td><?= htmlspecialchars($risk['likelihood']); ?></td>
                            <td><?= htmlspecialchars($risk['impact']); ?></td>
                            <td><?= htmlspecialchars($risk['risk_score']); ?></td>
                            <td><span class="badge <?= strtolower($level) ?>"><?= htmlspecialchars($level); ?></span></td>
                            <td><?= htmlspecialchars($strategy); ?></td>
                            <td><?= htmlspecialchars($mitigation); ?></td>
                        </tr>
                    <?php
                    endforeach;
                else:
                    ?>
                    <tr>
                        <td colspan="8" align="center">Tidak ada data risiko untuk ditampilkan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Dasar Penilaian Risiko</div>
        <p>Risk Level dihitung berdasarkan perkalian Likelihood (kemungkinan) dan Consequence (dampak). Penilaian dibagi menjadi kategori berikut:</p>
        <table class="table-border" style="width: 60%;">
            <thead>
                <tr>
                    <th>Rentang Nilai</th>
                    <th>Level Risiko</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1–4</td>
                    <td>Low</td>
                </tr>
                <tr>
                    <td>5–9</td>
                    <td>Medium</td>
                </tr>
                <tr>
                    <td>10–16</td>
                    <td>High</td>
                </tr>
                <tr>
                    <td>17–25</td>
                    <td>Extreme</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Strategi Penanganan Risiko</div>
        <table class="table-border" style="width: 100%;">
            <thead>
                <tr>
                    <th style="width: 15%;">Strategi</th>
                    <th>Penjelasan Singkat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mitigate</td>
                    <td>Mengurangi kemungkinan dan dampak risiko melalui kontrol teknis dan prosedural.</td>
                </tr>
                <tr>
                    <td>Avoid</td>
                    <td>Menghilangkan risiko dengan mengubah proses atau menghentikan aktivitas yang berisiko.</td>
                </tr>
                <tr>
                    <td>Transfer</td>
                    <td>Mengalihkan risiko ke pihak lain, misalnya melalui layanan pihak ketiga atau asuransi.</td>
                </tr>
                <tr>
                    <td>Accept</td>
                    <td>Menerima risiko yang dapat ditoleransi dan memantau dampaknya secara berkala.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Kesimpulan</div>
        <p>Berdasarkan hasil analisis menggunakan framework COBIT 2019, risiko dengan level High dan Medium memerlukan strategi mitigasi untuk menjaga keamanan dan keberlangsungan operasional sistem informasi kasir digital pada Rumah Makan Ayam Jingkrak TOB.</p>
    </div>

    <div class="footer">
        <div class="left">
            Tanggal cetak: <?= date('d-m-Y H:i:s'); ?>
        </div>
        <div class="right">
            Laporan Analisis Risiko TI – COBIT 2019<br>
            Rumah Makan Ayam Jingkrak TOB
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>