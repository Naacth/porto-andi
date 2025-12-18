<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="text-center mb-5 fade-in-up">
            <span class="badge bg-primary bg-opacity-10 text-primary mb-2 rounded-pill px-3">Academic Background</span>
            <h1 class="fw-bold display-5 text-gradient">Riwayat Pendidikan</h1>
            <p class="text-muted">Jejak perjalanan akademis dan kualifikasi pendidikan.</p>
        </div>

        <!-- Filter Component -->
        <div class="card glass border-0 rounded-4 mb-5 fade-in-up delay-100">
            <div class="card-body p-4">
                <form action="<?= base_url('/pendidikan'); ?>" method="get">
                    <div class="row g-3">
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 rounded-start-pill ps-3"><i class="bi bi-search text-primary"></i></span>
                                <input type="text" class="form-control border-start-0 rounded-end-pill py-2" name="keyword" placeholder="Cari nama sekolah..." value="<?= esc($keyword); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select rounded-pill py-2" name="jenjang">
                                <option value="">Semua Jenjang</option>
                                <option value="SD" <?= $jenjang == 'SD' ? 'selected' : ''; ?>>SD</option>
                                <option value="SMP" <?= $jenjang == 'SMP' ? 'selected' : ''; ?>>SMP</option>
                                <option value="SMA" <?= $jenjang == 'SMA' ? 'selected' : ''; ?>>SMA</option>
                                <option value="Kuliah" <?= $jenjang == 'Kuliah' ? 'selected' : ''; ?>>Kuliah</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select rounded-pill py-2" name="order">
                                <option value="DESC" <?= $order == 'DESC' ? 'selected' : ''; ?>>Terbaru</option>
                                <option value="ASC" <?= $order == 'ASC' ? 'selected' : ''; ?>>Terlama</option>
                            </select>
                        </div>
                        <div class="col-md-2 d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill fw-bold">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Timeline List -->
        <div class="fade-in-up delay-200">
            <?php if(empty($pendidikan)): ?>
                <div class="text-center py-5 glass rounded-4">
                    <div class="mb-3">
                        <i class="bi bi-folder2-open display-1 text-muted opacity-25"></i>
                    </div>
                    <h5 class="fw-bold text-muted">Belum ada data pendidikan</h5>
                    <p class="text-muted small">Coba ubah filter pencarian Anda.</p>
                </div>
            <?php else: ?>
                <div class="position-relative ps-4 ps-md-5">
                    <!-- Vertical Line -->
                    <div class="position-absolute start-0 top-0 bottom-0 border-start border-2 border-primary border-opacity-25 ms-2 ms-md-4"></div>

                    <?php foreach($pendidikan as $edu): ?>
                        <div class="position-relative mb-5">
                            <!-- Dot -->
                            <div class="position-absolute start-0 top-0 translate-middle ms-2 ms-md-4 mt-2 bg-white border border-4 border-primary rounded-circle shadow-sm" style="width: 20px; height: 20px; z-index: 2;"></div>
                            
                            <div class="card glass border-0 rounded-4 hover-card ms-4">
                                <div class="card-body p-4">
                                    <div class="d-md-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <span class="badge bg-primary bg-opacity-10 text-primary mb-2"><?= esc($edu['jenjang']); ?></span>
                                            <h4 class="fw-bold mb-1 card-title text-dark"><?= esc($edu['nama_sekolah']); ?></h4>
                                        </div>
                                        <div class="mt-2 mt-md-0 text-md-end">
                                            <div class="badge bg-white text-dark shadow-sm border px-3 py-2 rounded-pill">
                                                <i class="bi bi-calendar-check me-2 text-primary"></i>
                                                <?= esc($edu['tahun_masuk']); ?> - <?= esc($edu['tahun_lulus']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center text-muted small mt-3 border-top border-light pt-3">
                                        <i class="bi bi-mortarboard-fill me-2 fs-5 text-primary opacity-50"></i>
                                        <span>Alumni / Lulusan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <div class="mt-5 d-flex justify-content-center">
                    <?= $pager->links('pendidikan', 'default_full'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
