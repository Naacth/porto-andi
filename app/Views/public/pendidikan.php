<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="text-center mb-5 fade-in-up">
            <h1 class="fw-bold display-6">Riwayat Pendidikan</h1>
            <p class="text-muted">Jejak akademis dan pencapaian pendidikan.</p>
        </div>

        <!-- Filter Card -->
        <div class="card glass rounded-4 mb-4 border-0 fade-in-up delay-100">
            <div class="card-body p-4">
                <form action="<?= base_url('/pendidikan'); ?>" method="get">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                                <input type="text" class="form-control border-start-0 ps-0" name="keyword" placeholder="Cari Sekolah..." value="<?= esc($keyword); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" name="jenjang">
                                <option value="">Semua Jenjang</option>
                                <option value="SD" <?= $jenjang == 'SD' ? 'selected' : ''; ?>>SD</option>
                                <option value="SMP" <?= $jenjang == 'SMP' ? 'selected' : ''; ?>>SMP</option>
                                <option value="SMA" <?= $jenjang == 'SMA' ? 'selected' : ''; ?>>SMA</option>
                                <option value="Kuliah" <?= $jenjang == 'Kuliah' ? 'selected' : ''; ?>>Kuliah</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" name="order">
                                <option value="DESC" <?= $order == 'DESC' ? 'selected' : ''; ?>>Terbaru</option>
                                <option value="ASC" <?= $order == 'ASC' ? 'selected' : ''; ?>>Terlama</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                             <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary flex-grow-1"><i class="bi bi-arrow-right"></i></button>
                                <a href="<?= base_url('/pendidikan'); ?>" class="btn btn-light text-muted" title="Reset"><i class="bi bi-arrow-counterclockwise"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Pendidikan List -->
        <div class="fade-in-up delay-200">
            <?php if(empty($pendidikan)): ?>
                <div class="text-center py-5">
                    <img src="https://cdn-icons-png.flaticon.com/512/7486/7486777.png" width="80" class="mb-3 opacity-50" alt="No Data">
                    <p class="text-muted">Tidak ada data pendidikan yang ditemukan.</p>
                </div>
            <?php else: ?>
                <?php foreach($pendidikan as $edu): ?>
                    <div class="card glass hover-card border-0 rounded-4 mb-3">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-primary bg-opacity-10 p-3 rounded-3 text-primary me-4">
                                     <i class="bi bi-mortarboard-fill fs-4"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start mb-1">
                                        <h5 class="fw-bold mb-0"><?= esc($edu['nama_sekolah']); ?></h5>
                                        <span class="badge bg-primary rounded-pill px-3"><?= esc($edu['jenjang']); ?></span>
                                    </div>
                                    <p class="text-muted mb-0 small">
                                        <i class="bi bi-calendar-event me-1"></i> <?= esc($edu['tahun_masuk']); ?> - <?= esc($edu['tahun_lulus']); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <div class="mt-4">
                     <?= $pager->links('pendidikan', 'default_full'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
