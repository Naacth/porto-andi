<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="card-title mb-4"><?= $title; ?></h3>
        
        <form action="<?= base_url('admin/aktivitas/update/' . $aktivitas['id']); ?>" method="post">
            <?= csrf_field(); ?>
            
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= old('tanggal') ? old('tanggal') : $aktivitas['tanggal']; ?>">
                <div class="invalid-feedback"><?= $validation->getError('tanggal'); ?></div>
            </div>

            <div class="mb-3">
                <label for="nama_aktivitas" class="form-label">Nama Aktivitas</label>
                <input type="text" class="form-control <?= ($validation->hasError('nama_aktivitas')) ? 'is-invalid' : ''; ?>" id="nama_aktivitas" name="nama_aktivitas" value="<?= old('nama_aktivitas') ? old('nama_aktivitas') : $aktivitas['nama_aktivitas']; ?>">
                <div class="invalid-feedback"><?= $validation->getError('nama_aktivitas'); ?></div>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" rows="3"><?= old('keterangan') ? old('keterangan') : $aktivitas['keterangan']; ?></textarea>
                <div class="invalid-feedback"><?= $validation->getError('keterangan'); ?></div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= base_url('admin/aktivitas'); ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
