<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="text-center mb-5 fade-in-up">
            <h1 class="fw-bold display-6">Aktivitas Harian</h1>
            <p class="text-muted">Catatan kegiatan dan produktivitas sehari-hari.</p>
        </div>

         <!-- Filter Card -->
        <div class="card glass rounded-4 mb-4 border-0 fade-in-up delay-100">
            <div class="card-body p-4">
                <form action="<?= base_url('/aktivitas'); ?>" method="get">
                    <div class="row g-3">
                        <div class="col-md-6">
                             <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                                <input type="text" class="form-control border-start-0 ps-0" name="keyword" placeholder="Cari aktivitas..." value="<?= esc($keyword); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" name="order">
                                <option value="DESC" <?= $order == 'DESC' ? 'selected' : ''; ?>>Terbaru</option>
                                <option value="ASC" <?= $order == 'ASC' ? 'selected' : ''; ?>>Terlama</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                             <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-secondary flex-grow-1" style="background-color: var(--secondary-color); border-color: var(--secondary-color);"><i class="bi bi-arrow-right"></i></button>
                                <a href="<?= base_url('/aktivitas'); ?>" class="btn btn-light text-muted" title="Reset"><i class="bi bi-arrow-counterclockwise"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Aktivitas Timeline -->
        <div class="fade-in-up delay-200">
            <?php if(empty($aktivitas)): ?>
                  <div class="text-center py-5">
                    <img src="https://cdn-icons-png.flaticon.com/512/7486/7486803.png" width="80" class="mb-3 opacity-50" alt="No Data">
                    <p class="text-muted">Belum ada aktivitas yang tercatat.</p>
                </div>
            <?php else: ?>
                <div class="position-relative">
                    <?php foreach($aktivitas as $act): ?>
                        <div class="card glass hover-card border-0 rounded-4 mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-4 d-flex flex-column align-items-center">
                                        <div class="rounded-3 px-3 py-2 text-center text-white shadow-sm" style="background: var(--secondary-color);">
                                            <span class="d-block fw-bold small"><?= date('M', strtotime($act['tanggal'])); ?></span>
                                            <span class="d-block fs-4 fw-bold"><?= date('d', strtotime($act['tanggal'])); ?></span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fw-bold mb-2"><?= esc($act['nama_aktivitas']); ?></h5>
                                        <p class="text-muted mb-0"><?= nl2br(esc($act['keterangan'])); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                 <!-- Pagination -->
                 <div class="d-flex justify-content-center mt-4">
                     <?= $pager->links('aktivitas', 'default_full'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
