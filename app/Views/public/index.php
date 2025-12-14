<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <!-- Sidebar / Biodata -->
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm sticky-top" style="top: 80px; z-index: 1;">
            <div class="card-body text-center">
                 <!-- Placeholder for Profile Image if we had one -->
                <div class="mb-3">
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($biodata['nama'] ?? 'User'); ?>&size=128&background=random" class="rounded-circle" alt="Profile">
                </div>
                
                <?php if($biodata): ?>
                    <h3><?= esc($biodata['nama']); ?></h3>
                    <p class="text-muted"><?= esc($biodata['email']); ?></p>
                    <hr>
                    <div class="text-start">
                        <p><strong class="text-secondary"><i class="bi bi-geo-alt"></i> Alamat:</strong><br><?= nl2br(esc($biodata['alamat'])); ?></p>
                        <p><strong class="text-secondary"><i class="bi bi-phone"></i> No HP:</strong><br><?= esc($biodata['no_hp']); ?></p>
                         <p><strong class="text-secondary"><i class="bi bi-person-lines-fill"></i> Tentang:</strong><br><?= nl2br(esc($biodata['riwayat_singkat'])); ?></p>
                    </div>
                <?php else: ?>
                    <p class="text-danger">Biodata belum diisi.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Main Content: Education & Activities -->
    <div class="col-md-8">
        
        <!-- Pendidikan -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white border-0 py-3">
                <h4 class="mb-0 text-primary"><i class="bi bi-mortarboard-fill"></i> Riwayat Pendidikan</h4>
            </div>
            <div class="list-group list-group-flush">
                <?php if(empty($pendidikan)): ?>
                    <div class="list-group-item">Belum ada data pendidikan.</div>
                <?php else: ?>
                    <?php foreach($pendidikan as $edu): ?>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?= esc($edu['nama_sekolah']); ?></h5>
                                <small class="text-muted"><?= esc($edu['tahun_masuk']); ?> - <?= esc($edu['tahun_lulus']); ?></small>
                            </div>
                            <span class="badge bg-secondary"><?= esc($edu['jenjang']); ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Aktivitas -->
        <div class="card shadow-sm">
            <div class="card-header bg-white border-0 py-3">
                <h4 class="mb-0 text-success"><i class="bi bi-activity"></i> Aktivitas Harian</h4>
            </div>
            <div class="card-body">
                <?php if(empty($aktivitas)): ?>
                    <p>Belum ada aktivitas tercatat.</p>
                <?php else: ?>
                    <div class="timeline">
                        <?php foreach($aktivitas as $act): ?>
                            <div class="card mb-3 border-start border-3 border-success">
                                <div class="card-body py-2">
                                    <h6 class="card-title fw-bold"><?= esc($act['nama_aktivitas']); ?></h6>
                                    <h6 class="card-subtitle mb-2 text-muted small"><?= date('d M Y', strtotime($act['tanggal'])); ?></h6>
                                    <p class="card-text small"><?= nl2br(esc($act['keterangan'])); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>
