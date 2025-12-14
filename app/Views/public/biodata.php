<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row justify-content-center fade-in-up">
    <!-- Profile Card -->
    <div class="col-md-6 mb-4">
        <div class="card glass border-0 rounded-4 overflow-hidden text-center hover-card">
            <!-- Decorative Header -->
            <div class="bg-gradient-primary" style="height: 120px; background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));"></div>
            
            <div class="card-body px-5 pb-5 position-relative">
                <!-- Avatar -->
                <div class="position-absolute top-0 start-50 translate-middle">
                    <?php if(!empty($biodata['foto'])): ?>
                        <img src="<?= base_url('uploads/biodata/' . $biodata['foto']); ?>" class="rounded-circle shadow-lg p-1 bg-white object-fit-cover" width="120" height="120" alt="Profile">
                    <?php else: ?>
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($biodata['nama'] ?? 'User'); ?>&size=128&background=fff&color=4f46e5&bold=true" class="rounded-circle shadow-lg p-1 bg-white" width="120" alt="Profile">
                    <?php endif; ?>
                </div>
                
                <div class="mt-5 pt-3">
                     <?php if($biodata): ?>
                        <h2 class="fw-bold mb-1"><?= esc($biodata['nama']); ?></h2>
                        <span class="badge rounded-pill bg-light text-primary mb-3">Professional Developer</span>
                        
                        <p class="text-muted mb-4"><?= nl2br(esc($biodata['riwayat_singkat'])); ?></p>
                        
                        <div class="d-grid gap-3 text-start bg-light p-4 rounded-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-square bg-white shadow-sm p-2 rounded-3 me-3 text-primary">
                                    <i class="bi bi-envelope-fill fs-5"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Email</small>
                                    <span class="fw-medium"><?= esc($biodata['email']); ?></span>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center">
                                <div class="icon-square bg-white shadow-sm p-2 rounded-3 me-3 text-secondary">
                                    <i class="bi bi-telephone-fill fs-5"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Phone</small>
                                    <span class="fw-medium"><?= esc($biodata['no_hp']); ?></span>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center">
                                <div class="icon-square bg-white shadow-sm p-2 rounded-3 me-3 text-info">
                                    <i class="bi bi-geo-alt-fill fs-5"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Location</small>
                                    <span class="fw-medium"><?= nl2br(esc($biodata['alamat'])); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <i class="bi bi-emoji-frown fs-1 text-muted"></i>
                            <p class="mt-3 text-danger">Biodata belum diisi.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
