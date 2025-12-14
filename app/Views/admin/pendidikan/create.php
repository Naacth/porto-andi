<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="card-title mb-4"><?= $title; ?></h3>
        
        <form action="<?= base_url('admin/pendidikan/save'); ?>" method="post">
            <?= csrf_field(); ?>
            
            <div class="mb-3">
                <label for="jenjang" class="form-label">Jenjang</label>
                <select class="form-select <?= ($validation->hasError('jenjang')) ? 'is-invalid' : ''; ?>" id="jenjang" name="jenjang">
                    <option value="" selected disabled>Pilih Jenjang</option>
                    <option value="SD" <?= (old('jenjang') == 'SD') ? 'selected' : ''; ?>>SD</option>
                    <option value="SMP" <?= (old('jenjang') == 'SMP') ? 'selected' : ''; ?>>SMP</option>
                    <option value="SMA" <?= (old('jenjang') == 'SMA') ? 'selected' : ''; ?>>SMA</option>
                    <option value="Kuliah" <?= (old('jenjang') == 'Kuliah') ? 'selected' : ''; ?>>Kuliah</option>
                </select>
                <div class="invalid-feedback"><?= $validation->getError('jenjang'); ?></div>
            </div>

            <div class="mb-3">
                <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                <input type="text" class="form-control <?= ($validation->hasError('nama_sekolah')) ? 'is-invalid' : ''; ?>" id="nama_sekolah" name="nama_sekolah" value="<?= old('nama_sekolah'); ?>">
                <div class="invalid-feedback"><?= $validation->getError('nama_sekolah'); ?></div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                    <input type="number" class="form-control <?= ($validation->hasError('tahun_masuk')) ? 'is-invalid' : ''; ?>" id="tahun_masuk" name="tahun_masuk" value="<?= old('tahun_masuk'); ?>" placeholder="YYYY">
                    <div class="invalid-feedback"><?= $validation->getError('tahun_masuk'); ?></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                    <input type="number" class="form-control <?= ($validation->hasError('tahun_lulus')) ? 'is-invalid' : ''; ?>" id="tahun_lulus" name="tahun_lulus" value="<?= old('tahun_lulus'); ?>" placeholder="YYYY">
                    <div class="invalid-feedback"><?= $validation->getError('tahun_lulus'); ?></div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('admin/pendidikan'); ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
