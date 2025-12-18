<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1"><?= $title; ?></h3>
                <p class="text-muted small mb-0">Update your public profile information</p>
            </div>
            <a href="<?= base_url('/admin'); ?>" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                <i class="bi bi-arrow-left me-1"></i> Dashboard
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form action="<?= base_url('admin/biodata/update/' . $biodata['id']); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    
                    <!-- Profile Photo Section -->
                    <div class="row mb-5 align-items-center">
                        <div class="col-md-auto mb-3 mb-md-0">
                             <div class="position-relative d-inline-block">
                                <?php if(!empty($biodata['foto'])): ?>
                                    <img src="<?= base_url('uploads/biodata/' . $biodata['foto']); ?>" class="rounded-circle shadow-sm border border-4 border-white" width="120" height="120" style="object-fit: cover;" alt="Foto Profil">
                                <?php else: ?>
                                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($biodata['nama']); ?>&size=120&background=6366f1&color=fff" class="rounded-circle shadow-sm border border-4 border-white" alt="Avatar">
                                <?php endif; ?>
                             </div>
                        </div>
                        <div class="col-md">
                            <label for="foto" class="form-label fw-bold">Foto Profil</label>
                            <input type="file" class="form-control rounded-3" id="foto" name="foto">
                            <div class="form-text small">Recommended: Square image, max 2MB (JPG/PNG).</div>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Primary Info -->
                        <div class="col-12">
                            <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">Informasi Dasar</h5>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="nama" class="form-label small fw-bold text-muted">Nama Lengkap</label>
                            <input type="text" class="form-control rounded-3 py-2 <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ? old('nama') : $biodata['nama']; ?>" placeholder="Masukkan nama lengkap">
                            <div class="invalid-feedback"><?= $validation->getError('nama'); ?></div>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label small fw-bold text-muted">Email</label>
                            <input type="email" class="form-control rounded-3 py-2 <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ? old('email') : $biodata['email']; ?>" placeholder="email@example.com">
                            <div class="invalid-feedback"><?= $validation->getError('email'); ?></div>
                        </div>

                        <div class="col-md-6">
                            <label for="no_hp" class="form-label small fw-bold text-muted">Nomor WhatsApp/HP</label>
                            <input type="text" class="form-control rounded-3 py-2 <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" name="no_hp" value="<?= old('no_hp') ? old('no_hp') : $biodata['no_hp']; ?>" placeholder="08xxx">
                            <div class="invalid-feedback"><?= $validation->getError('no_hp'); ?></div>
                        </div>

                        <div class="col-md-6">
                            <label for="alamat" class="form-label small fw-bold text-muted">Alamat</label>
                            <input type="text" class="form-control rounded-3 py-2 <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat') ? old('alamat') : $biodata['alamat']; ?>" placeholder="Kota, Provinsi">
                            <div class="invalid-feedback"><?= $validation->getError('alamat'); ?></div>
                        </div>

                        <div class="col-12">
                            <label for="riwayat_singkat" class="form-label small fw-bold text-muted">Tentang Saya / Bio</label>
                            <textarea class="form-control rounded-4 py-2 <?= ($validation->hasError('riwayat_singkat')) ? 'is-invalid' : ''; ?>" id="riwayat_singkat" name="riwayat_singkat" rows="4" placeholder="Ceritakan singkat tentang diri Anda..."><?= old('riwayat_singkat') ? old('riwayat_singkat') : $biodata['riwayat_singkat']; ?></textarea>
                            <div class="invalid-feedback"><?= $validation->getError('riwayat_singkat'); ?></div>
                        </div>

                        <!-- Social Media Info -->
                        <div class="col-12 mt-5">
                            <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">Media Sosial</h5>
                        </div>

                        <div class="col-md-6">
                            <label for="link_github" class="form-label small fw-bold text-muted"><i class="bi bi-github me-1"></i> GitHub Profile</label>
                            <input type="text" class="form-control rounded-3 py-2" id="link_github" name="link_github" value="<?= old('link_github') ? old('link_github') : $biodata['link_github']; ?>" placeholder="https://github.com/username">
                        </div>

                        <div class="col-md-6">
                            <label for="link_linkedin" class="form-label small fw-bold text-muted"><i class="bi bi-linkedin me-1"></i> LinkedIn Profile</label>
                            <input type="text" class="form-control rounded-3 py-2" id="link_linkedin" name="link_linkedin" value="<?= old('link_linkedin') ? old('link_linkedin') : $biodata['link_linkedin']; ?>" placeholder="https://linkedin.com/in/username">
                        </div>

                        <div class="col-md-6">
                            <label for="link_instagram" class="form-label small fw-bold text-muted"><i class="bi bi-instagram me-1"></i> Instagram Profile</label>
                            <input type="text" class="form-control rounded-3 py-2" id="link_instagram" name="link_instagram" value="<?= old('link_instagram') ? old('link_instagram') : $biodata['link_instagram']; ?>" placeholder="https://instagram.com/username">
                        </div>

                        <div class="col-md-6">
                            <label for="link_twitter" class="form-label small fw-bold text-muted"><i class="bi bi-twitter-x me-1"></i> Twitter / X Profile</label>
                            <input type="text" class="form-control rounded-3 py-2" id="link_twitter" name="link_twitter" value="<?= old('link_twitter') ? old('link_twitter') : $biodata['link_twitter']; ?>" placeholder="https://x.com/username">
                        </div>

                        <div class="col-12 mt-5">
                            <hr>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="<?= base_url('/admin'); ?>" class="btn btn-light rounded-pill px-4">Batal</a>
                                <button type="submit" class="btn btn-primary rounded-pill px-5 shadow">
                                    <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
