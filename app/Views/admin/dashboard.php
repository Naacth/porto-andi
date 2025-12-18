<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm overflow-hidden h-100" style="background: linear-gradient(135deg, var(--primary-color), #4f46e5);">
            <div class="card-body position-relative text-white p-4">
                <div class="position-absolute end-0 top-0 opacity-25 p-3">
                    <i class="bi bi-person-badge display-1"></i>
                </div>
                <div class="position-relative z-1">
                    <h5 class="card-title fw-light text-uppercase small mb-2 opacity-75">Status Biodata</h5>
                    <h2 class="fw-bold mb-3"><?= $has_biodata ? 'Lengkap' : 'Incomplete'; ?></h2>
                    <a href="<?= base_url('admin/biodata'); ?>" class="btn btn-sm btn-white bg-white text-primary rounded-pill px-3 shadow-sm">
                        Kelola Biodata <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-0 shadow-sm overflow-hidden h-100" style="background: linear-gradient(135deg, #10b981, #059669);">
            <div class="card-body position-relative text-white p-4">
                <div class="position-absolute end-0 top-0 opacity-25 p-3">
                    <i class="bi bi-activity display-1"></i>
                </div>
                <div class="position-relative z-1">
                    <h5 class="card-title fw-light text-uppercase small mb-2 opacity-75">Total Aktivitas</h5>
                    <h2 class="display-4 fw-bold mb-1"><?= $count_aktivitas; ?></h2>
                    <p class="small opacity-75 mb-3">Kegiatan tercatat</p>
                    <a href="<?= base_url('admin/aktivitas'); ?>" class="text-white text-decoration-none small fw-bold stretched-link">Lihat Detail <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm overflow-hidden h-100" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
            <div class="card-body position-relative text-white p-4">
                <div class="position-absolute end-0 top-0 opacity-25 p-3">
                    <i class="bi bi-mortarboard display-1"></i>
                </div>
                <div class="position-relative z-1">
                    <h5 class="card-title fw-light text-uppercase small mb-2 opacity-75">Riwayat Pendidikan</h5>
                    <h2 class="display-4 fw-bold mb-1"><?= $count_pendidikan; ?></h2>
                     <p class="small opacity-75 mb-3">Institusi terdaftar</p>
                    <a href="<?= base_url('admin/pendidikan'); ?>" class="text-white text-decoration-none small fw-bold stretched-link">Lihat Detail <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
