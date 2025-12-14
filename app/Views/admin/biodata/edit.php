<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="card-title mb-4"><?= $title; ?></h3>
        
        <form action="<?= base_url('admin/biodata/update/' . $biodata['id']); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Profil</label>
                <div class="row align-items-center">
                    <div class="col-md-2">
                         <?php if(!empty($biodata['foto'])): ?>
                            <img src="<?= base_url('uploads/biodata/' . $biodata['foto']); ?>" class="img-thumbnail rounded-circle" width="100" alt="Foto Lama">
                        <?php else: ?>
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($biodata['nama']); ?>&size=100" class="img-thumbnail rounded-circle" alt="Preview">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-10">
                        <input type="file" class="form-control" id="foto" name="foto">
                        <div class="form-text text-muted">Format JPG/PNG, Max 2MB. Kosongkan jika tidak ingin mengganti.</div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ? old('nama') : $biodata['nama']; ?>">
                <div class="invalid-feedback"><?= $validation->getError('nama'); ?></div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ? old('email') : $biodata['email']; ?>">
                <div class="invalid-feedback"><?= $validation->getError('email'); ?></div>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" name="no_hp" value="<?= old('no_hp') ? old('no_hp') : $biodata['no_hp']; ?>">
                <div class="invalid-feedback"><?= $validation->getError('no_hp'); ?></div>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" rows="3"><?= old('alamat') ? old('alamat') : $biodata['alamat']; ?></textarea>
                <div class="invalid-feedback"><?= $validation->getError('alamat'); ?></div>
            </div>

            <div class="mb-3">
                <label for="riwayat_singkat" class="form-label">Riwayat Singkat / Bio</label>
                <textarea class="form-control <?= ($validation->hasError('riwayat_singkat')) ? 'is-invalid' : ''; ?>" id="riwayat_singkat" name="riwayat_singkat" rows="4"><?= old('riwayat_singkat') ? old('riwayat_singkat') : $biodata['riwayat_singkat']; ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('riwayat_singkat'); ?>
                </div>
            </div>

            <h5 class="mt-4 mb-3 border-bottom pb-2">Social Media</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="link_github" class="form-label"><i class="bi bi-github"></i> GitHub URL</label>
                    <input type="text" class="form-control" id="link_github" name="link_github" value="<?= old('link_github') ? old('link_github') : $biodata['link_github']; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="link_linkedin" class="form-label"><i class="bi bi-linkedin"></i> LinkedIn URL</label>
                    <input type="text" class="form-control" id="link_linkedin" name="link_linkedin" value="<?= old('link_linkedin') ? old('link_linkedin') : $biodata['link_linkedin']; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="link_instagram" class="form-label"><i class="bi bi-instagram"></i> Instagram URL</label>
                    <input type="text" class="form-control" id="link_instagram" name="link_instagram" value="<?= old('link_instagram') ? old('link_instagram') : $biodata['link_instagram']; ?>">
                </div>
                 <div class="col-md-6 mb-3">
                    <label for="link_twitter" class="form-label"><i class="bi bi-twitter-x"></i> X (Twitter) URL</label>
                    <input type="text" class="form-control" id="link_twitter" name="link_twitter" value="<?= old('link_twitter') ? old('link_twitter') : $biodata['link_twitter']; ?>">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-save"></i> Simpan Perubahan</button>
            <a href="<?= base_url('/admin'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
