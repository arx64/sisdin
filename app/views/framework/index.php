<?php
// Framework view
?>

<div class="container-fluid">

    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="fas fa-cube"></i> Framework COBIT 2019</h2>
            <p class="text-muted">
                Penjelasan domain COBIT 2019 dan fokus penelitian APO12 & APO13
            </p>
        </div>
    </div>

    <!-- Tabel 5 Domain COBIT -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-table"></i>
                    Domain COBIT 2019
                </div>

                <div class="card-body p-0">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th width="15%">Domain</th>
                                <th width="25%">Nama Domain</th>
                                <th width="60%">Deskripsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><strong>EDM</strong></td>
                                <td>Evaluate, Direct and Monitor</td>
                                <td>
                                    Domain yang berfokus pada evaluasi, pengarahan,
                                    dan pengawasan tata kelola TI organisasi.
                                </td>
                            </tr>

                            <tr>
                                <td><strong>APO</strong></td>
                                <td>Align, Plan and Organize</td>
                                <td>
                                    Domain yang mengatur perencanaan, strategi,
                                    serta pengelolaan teknologi informasi agar
                                    selaras dengan tujuan bisnis.
                                </td>
                            </tr>

                            <tr>
                                <td><strong>BAI</strong></td>
                                <td>Build, Acquire and Implement</td>
                                <td>
                                    Domain yang berfokus pada pengembangan,
                                    implementasi, dan perubahan sistem informasi.
                                </td>
                            </tr>

                            <tr>
                                <td><strong>DSS</strong></td>
                                <td>Deliver, Service and Support</td>
                                <td>
                                    Domain yang berkaitan dengan layanan operasional,
                                    dukungan TI, keamanan, dan pengelolaan insiden.
                                </td>
                            </tr>

                            <tr>
                                <td><strong>MEA</strong></td>
                                <td>Monitor, Evaluate and Assess</td>
                                <td>
                                    Domain yang berfungsi untuk memonitor,
                                    mengevaluasi, dan menilai kinerja tata kelola TI.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- APO12 -->
    <div class="row mb-4">
        <div class="col-md-12">

            <div class="card shadow-sm">
                <div class="card-header bg-warning">
                    <h5 class="mb-0">
                        <i class="fas fa-exclamation-triangle"></i>
                        <?php echo $apo12['name']; ?>
                    </h5>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <strong>Deskripsi:</strong>
                        <p class="mb-0 mt-1">
                            <?php echo $apo12['description']; ?>
                        </p>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">

                            <thead class="table-light">
                                <tr>
                                    <th width="10%">No</th>
                                    <th>Proses APO12</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($apo12['processes'] as $index => $proc): ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $index + 1; ?>
                                        </td>
                                        <td><?php echo $proc; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- APO13 -->
    <div class="row">
        <div class="col-md-12">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-shield-alt"></i>
                        <?php echo $apo13['name']; ?>
                    </h5>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <strong>Deskripsi:</strong>
                        <p class="mb-0 mt-1">
                            <?php echo $apo13['description']; ?>
                        </p>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">

                            <thead class="table-light">
                                <tr>
                                    <th width="10%">No</th>
                                    <th>Proses APO13</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($apo13['processes'] as $index => $proc): ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $index + 1; ?>
                                        </td>
                                        <td><?php echo $proc; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>