<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="card-title mb-4"><?= $title; ?></h3>
        
        <form action="<?= base_url('admin/biodata/save'); ?>" method="post">
            <?= csrf_field(); ?>
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>" autofocus>
                <div class="invalid-feedback"><?= $validation->getError('nama'); ?></div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>">
                <div class="invalid-feedback"><?= $validation->getError('email'); ?></div>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" name="no_hp" value="<?= old('no_hp'); ?>">
                <div class="invalid-feedback"><?= $validation->getError('no_hp'); ?></div>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" rows="3"><?= old('alamat'); ?></textarea>
                <div class="invalid-feedback"><?= $validation->getError('alamat'); ?></div>
            </div>

            <div class="mb-3">
                <label for="riwayat_singkat" class="form-label">Riwayat Singkat</label>
                <textarea class="form-control <?= ($validation->hasError('riwayat_singkat')) ? 'is-invalid' : ''; ?>" id="riwayat_singkat" name="riwayat_singkat" rows="5"><?= old('riwayat_singkat'); ?></textarea>
                <div class="invalid-feedback"><?= $validation->getError('riwayat_singkat'); ?></div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Biodata</button>
            <a href="<?= base_url('/admin'); ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
