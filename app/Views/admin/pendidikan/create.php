<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1"><?= $title; ?></h3>
                <p class="text-muted small mb-0">Add a new educational history record</p>
            </div>
            <a href="<?= base_url('admin/pendidikan'); ?>" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form action="<?= base_url('admin/pendidikan/save'); ?>" method="post">
                    <?= csrf_field(); ?>
                    
                    <div class="mb-4">
                        <label for="jenjang" class="form-label small fw-bold text-muted">Jenjang Pendidikan</label>
                        <select class="form-select rounded-3 py-2 <?= ($validation->hasError('jenjang')) ? 'is-invalid' : ''; ?>" id="jenjang" name="jenjang">
                            <option value="" selected disabled>Pilih Jenjang</option>
                            <option value="SD" <?= (old('jenjang') == 'SD') ? 'selected' : ''; ?>>SD / Sederajat</option>
                            <option value="SMP" <?= (old('jenjang') == 'SMP') ? 'selected' : ''; ?>>SMP / Sederajat</option>
                            <option value="SMA" <?= (old('jenjang') == 'SMA') ? 'selected' : ''; ?>>SMA / SMK / Sederajat</option>
                            <option value="Kuliah" <?= (old('jenjang') == 'Kuliah') ? 'selected' : ''; ?>>Perguruan Tinggi</option>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('jenjang'); ?></div>
                    </div>

                    <div class="mb-4">
                        <label for="nama_sekolah" class="form-label small fw-bold text-muted">Nama Sekolah / Institusi</label>
                        <input type="text" class="form-control rounded-3 py-2 <?= ($validation->hasError('nama_sekolah')) ? 'is-invalid' : ''; ?>" id="nama_sekolah" name="nama_sekolah" value="<?= old('nama_sekolah'); ?>" placeholder="Contoh: Universitas Gadjah Mada">
                        <div class="invalid-feedback"><?= $validation->getError('nama_sekolah'); ?></div>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label for="tahun_masuk" class="form-label small fw-bold text-muted">Tahun Masuk</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-calendar-plus text-muted"></i></span>
                                <input type="number" class="form-control bg-light border-start-0 py-2 <?= ($validation->hasError('tahun_masuk')) ? 'is-invalid' : ''; ?>" id="tahun_masuk" name="tahun_masuk" value="<?= old('tahun_masuk'); ?>" placeholder="Contoh: 2020">
                            </div>
                            <?php if($validation->hasError('tahun_masuk')): ?>
                                <div class="text-danger small mt-1 pl-1"><?= $validation->getError('tahun_masuk'); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label for="tahun_lulus" class="form-label small fw-bold text-muted">Tahun Lulus</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-calendar-check text-muted"></i></span>
                                <input type="number" class="form-control bg-light border-start-0 py-2 <?= ($validation->hasError('tahun_lulus')) ? 'is-invalid' : ''; ?>" id="tahun_lulus" name="tahun_lulus" value="<?= old('tahun_lulus'); ?>" placeholder="Contoh: 2024">
                            </div>
                            <?php if($validation->hasError('tahun_lulus')): ?>
                                <div class="text-danger small mt-1 pl-1"><?= $validation->getError('tahun_lulus'); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <hr class="mt-5 mb-4">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= base_url('admin/pendidikan'); ?>" class="btn btn-light rounded-pill px-4">Batal</a>
                        <button type="submit" class="btn btn-primary rounded-pill px-5 shadow">
                            <i class="bi bi-save me-1"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
