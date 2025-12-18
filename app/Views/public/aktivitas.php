<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="text-center mb-5 fade-in-up">
            <span class="badge bg-secondary bg-opacity-10 text-secondary mb-2 rounded-pill px-3">Daily Journal</span>
            <h1 class="fw-bold display-5 text-gradient">Aktivitas Harian</h1>
            <p class="text-muted">Catatan produktivitas dan kegiatan sehari-hari.</p>
        </div>

         <!-- Filter Card -->
        <div class="card glass rounded-4 mb-5 border-0 fade-in-up delay-100">
            <div class="card-body p-4">
                <form action="<?= base_url('/aktivitas'); ?>" method="get">
                    <div class="row g-3">
                        <div class="col-md-6">
                             <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 rounded-start-pill ps-3"><i class="bi bi-search text-secondary"></i></span>
                                <input type="text" class="form-control border-start-0 rounded-end-pill py-2" name="keyword" placeholder="Cari aktivitas..." value="<?= esc($keyword); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select rounded-pill py-2" name="order">
                                <option value="DESC" <?= $order == 'DESC' ? 'selected' : ''; ?>>Terbaru</option>
                                <option value="ASC" <?= $order == 'ASC' ? 'selected' : ''; ?>>Terlama</option>
                            </select>
                        </div>
                        <div class="col-md-2 d-grid">
                            <button type="submit" class="btn btn-secondary rounded-pill fw-bold text-white">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Aktivitas Feed -->
        <div class="fade-in-up delay-200">
            <?php if(empty($aktivitas)): ?>
                  <div class="text-center py-5 glass rounded-4">
                    <div class="mb-3">
                        <i class="bi bi-calendar-x display-1 text-muted opacity-25"></i>
                    </div>
                    <h5 class="fw-bold text-muted">Belum ada aktivitas</h5>
                    <p class="text-muted small">Mulai catat kegiatan produktifmu hari ini.</p>
                </div>
            <?php else: ?>
                <div class="row g-4">
                    <?php foreach($aktivitas as $act): ?>
                        <div class="col-12">
                            <div class="card glass hover-card border-0 rounded-4 overflow-hidden">
                                <div class="card-body p-0">
                                    <div class="d-flex">
                                        <!-- Date Badge -->
                                        <div class="bg-secondary bg-opacity-10 text-center py-4 px-3 d-flex flex-column justify-content-center" style="min-width: 100px;">
                                            <span class="d-block small text-uppercase fw-bold text-secondary text-opacity-75"><?= date('M', strtotime($act['tanggal'])); ?></span>
                                            <span class="d-block display-6 fw-bold text-secondary"><?= date('d', strtotime($act['tanggal'])); ?></span>
                                            <span class="d-block small text-muted"><?= date('Y', strtotime($act['tanggal'])); ?></span>
                                        </div>
                                        
                                        <!-- Content -->
                                        <div class="p-4 flex-grow-1">
                                            <h4 class="fw-bold text-dark mb-2"><?= esc($act['nama_aktivitas']); ?></h4>
                                            <p class="text-muted mb-0 lh-lg">
                                                <?= nl2br(esc($act['keterangan'])); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                 <!-- Pagination -->
                 <div class="d-flex justify-content-center mt-5">
                     <?= $pager->links('aktivitas', 'default_full'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
