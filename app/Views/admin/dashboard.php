<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-primary shadow h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Biodata</h5>
                         <p class="card-text status-text">
                            <?= $has_biodata ? 'Sudah Diisi' : 'Belum Diisi'; ?>
                        </p>
                    </div>
                    <i class="bi bi-person-badge fs-1"></i>
                </div>
            </div>
             <div class="card-footer bg-transparent border-0 text-end">
                <a href="<?= base_url('admin/biodata'); ?>" class="text-white text-decoration-none">Kelola <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-success shadow h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Aktivitas</h5>
                        <h2 class="display-4 fw-bold"><?= $count_aktivitas; ?></h2>
                    </div>
                     <i class="bi bi-activity fs-1"></i>
                </div>
            </div>
             <div class="card-footer bg-transparent border-0 text-end">
                <a href="<?= base_url('admin/aktivitas'); ?>" class="text-white text-decoration-none">Lihat Detail <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card text-white bg-warning shadow h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Riwayat Pendidikan</h5>
                        <h2 class="display-4 fw-bold"><?= $count_pendidikan; ?></h2>
                    </div>
                     <i class="bi bi-mortarboard fs-1"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 text-end">
                <a href="<?= base_url('admin/pendidikan'); ?>" class="text-white text-decoration-none">Lihat Detail <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
