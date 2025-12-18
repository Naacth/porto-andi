<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1"><?= $title; ?></h3>
                <p class="text-muted small mb-0">Modify an existing professional activity record</p>
            </div>
            <a href="<?= base_url('admin/aktivitas'); ?>" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form action="<?= base_url('admin/aktivitas/update/' . $aktivitas['id']); ?>" method="post">
                    <?= csrf_field(); ?>
                    
                    <div class="mb-4">
                        <label for="tanggal" class="form-label small fw-bold text-muted">Tanggal Aktivitas</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-calendar-event text-muted"></i></span>
                            <input type="date" class="form-control rounded-end-3 py-2 <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= old('tanggal') ? old('tanggal') : $aktivitas['tanggal']; ?>">
                        </div>
                        <div class="invalid-feedback d-block"><?= $validation->getError('tanggal'); ?></div>
                    </div>

                    <div class="mb-4">
                        <label for="nama_aktivitas" class="form-label small fw-bold text-muted">Nama Aktivitas / Judul</label>
                        <input type="text" class="form-control rounded-3 py-2 <?= ($validation->hasError('nama_aktivitas')) ? 'is-invalid' : ''; ?>" id="nama_aktivitas" name="nama_aktivitas" value="<?= old('nama_aktivitas') ? old('nama_aktivitas') : $aktivitas['nama_aktivitas']; ?>" placeholder="Contoh: Mengembangkan Modul Auth">
                        <div class="invalid-feedback"><?= $validation->getError('nama_aktivitas'); ?></div>
                    </div>

                    <div class="mb-4">
                        <label for="keterangan" class="form-label small fw-bold text-muted">Keterangan Detail</label>
                        <textarea class="form-control rounded-4 py-2 <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" rows="5" placeholder="Jelaskan apa yang Anda kerjakan atau capai..."><?= old('keterangan') ? old('keterangan') : $aktivitas['keterangan']; ?></textarea>
                        <div class="invalid-feedback"><?= $validation->getError('keterangan'); ?></div>
                    </div>

                    <hr class="mt-5 mb-4">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= base_url('admin/aktivitas'); ?>" class="btn btn-light rounded-pill px-4">Batal</a>
                        <button type="submit" class="btn btn-secondary rounded-pill px-5 shadow text-white">
                            <i class="bi bi-check-circle me-1"></i> Update Aktivitas
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
