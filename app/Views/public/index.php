<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row g-4 justify-content-center">
    <!-- Sidebar / Biodata (Sticky) -->
    <div class="col-lg-4">
        <div class="card glass border-0 rounded-4 sticky-top overflow-hidden fade-in-up" style="top: 100px; z-index: 10;">
            <div class="card-body p-0 text-center">
                <!-- Decorative Background -->
                <div style="height: 140px; background: linear-gradient(120deg, var(--primary-color), var(--secondary-color));"></div>
                
                <!-- Avatar -->
                <div class="position-relative" style="margin-top: -70px;">
                     <div class="d-inline-block p-1 bg-white rounded-circle shadow-lg">
                        <?php if(!empty($biodata['foto'])): ?>
                            <img src="<?= base_url('uploads/biodata/' . $biodata['foto']); ?>" class="rounded-circle object-fit-cover border border-4 border-white shadow-sm" width="140" height="140" alt="Profile">
                        <?php else: ?>
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($biodata['nama'] ?? 'User'); ?>&size=140&background=6366f1&color=fff&font-size=0.4" class="rounded-circle object-fit-cover" width="140" height="140" alt="Profile">
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="px-4 pb-4 mt-3">
                    <?php if($biodata): ?>
                        <h3 class="fw-bold mb-1"><?= esc($biodata['nama']); ?></h3>
                        <p class="text-primary fw-medium mb-3 small"><?= esc($biodata['email']); ?></p>
                        
                        <p class="text-muted small mb-4 line-clamp-3">
                            <?= nl2br(esc($biodata['riwayat_singkat'])); ?>
                        </p>
                        
                        <div class="d-grid gap-2 mb-4 text-start">
                             <div class="d-flex align-items-center p-3 rounded-3 bg-white bg-opacity-50 border border-white">
                                <i class="bi bi-geo-alt-fill text-danger me-3 fs-5"></i>
                                <div>
                                    <span class="d-block text-muted small fw-bold text-uppercase">Alamat</span>
                                    <span class="small text-dark fw-medium"><?= nl2br(esc($biodata['alamat'])); ?></span>
                                </div>
                             </div>
                             <div class="d-flex align-items-center p-3 rounded-3 bg-white bg-opacity-50 border border-white">
                                <i class="bi bi-whatsapp text-success me-3 fs-5"></i>
                                <div>
                                    <span class="d-block text-muted small fw-bold text-uppercase">Whatsapp</span>
                                    <span class="small text-dark fw-medium"><?= esc($biodata['no_hp']); ?></span>
                                </div>
                             </div>
                        </div>

                        <div class="d-flex justify-content-center gap-2">
                            <?php if(!empty($biodata['link_github'])): ?>
                                <a href="<?= $biodata['link_github']; ?>" class="btn btn-outline-dark rounded-circle border-2" style="width:40px;height:40px;"><i class="bi bi-github"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($biodata['link_linkedin'])): ?>
                                <a href="<?= $biodata['link_linkedin']; ?>" class="btn btn-outline-primary rounded-circle border-2" style="width:40px;height:40px;"><i class="bi bi-linkedin"></i></a>
                            <?php endif; ?>
                            <?php if(!empty($biodata['link_instagram'])): ?>
                                <a href="<?= $biodata['link_instagram']; ?>" class="btn btn-outline-danger rounded-circle border-2" style="width:40px;height:40px;"><i class="bi bi-instagram"></i></a>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning border-0 bg-warning bg-opacity-10 text-warning">
                            <i class="bi bi-exclamation-triangle me-2"></i> Biodata belum diisi.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="col-lg-8">
        
        <!-- Welcome Hero Component (Optional) -->
        <div class="card glass border-0 rounded-4 p-4 mb-4 text-white position-relative overflow-hidden fade-in-up delay-100" style="background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));">
            <div class="position-absolute end-0 bottom-0 opacity-10 pe-3 pb-3">
                <i class="bi bi-code-slash display-1"></i>
            </div>
            <div class="position-relative z-1">
                <h2 class="fw-bold">Welcome Back! 👋</h2>
                <p class="mb-0 opacity-75">Explore my latest activities and educational background.</p>
            </div>
        </div>

        <!-- Latest Education -->
        <div class="d-flex align-items-center justify-content-between mb-3 fade-in-up delay-100">
            <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-mortarboard-fill text-primary me-2"></i> Pendidikan Terakhir</h5>
            <a href="<?= base_url('/pendidikan'); ?>" class="text-decoration-none small fw-bold">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row g-3 mb-5 fade-in-up delay-200">
            <?php if(empty($pendidikan)): ?>
                <div class="col-12">
                     <div class="card glass border-0 rounded-4 py-4 text-center">
                        <p class="text-muted mb-0">Belum ada data pendidikan.</p>
                    </div>
                </div>
            <?php else: ?>
                <?php $latestEdu = array_slice($pendidikan, 0, 2); // Show only top 2 ?>
                <?php foreach($latestEdu as $edu): ?>
                    <div class="col-md-6">
                        <div class="card glass border-0 rounded-4 h-100 hover-card">
                            <div class="card-body">
                                <span class="badge bg-primary bg-opacity-10 text-primary mb-3"><?= esc($edu['jenjang']); ?></span>
                                <h5 class="card-title fw-bold text-dark"><?= esc($edu['nama_sekolah']); ?></h5>
                                <p class="card-text text-muted small mb-0">
                                    <i class="bi bi-calendar-range me-1"></i> <?= esc($edu['tahun_masuk']); ?> - <?= esc($edu['tahun_lulus']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Latest Activities -->
        <div class="d-flex align-items-center justify-content-between mb-3 fade-in-up delay-300">
            <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-activity text-secondary me-2"></i> Aktivitas Terbaru</h5>
            <a href="<?= base_url('/aktivitas'); ?>" class="text-decoration-none small fw-bold">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="card glass border-0 rounded-4 fade-in-up delay-300">
            <div class="list-group list-group-flush rounded-4">
                <?php if(empty($aktivitas)): ?>
                     <div class="list-group-item bg-transparent text-center py-5 border-0">
                        <p class="text-muted mb-0">Belum ada aktivitas tercatat.</p>
                    </div>
                <?php else: ?>
                    <?php $latestAct = array_slice($aktivitas, 0, 5); // Show top 5 ?>
                    <?php foreach($latestAct as $act): ?>
                        <div class="list-group-item bg-transparent border-light py-3 px-4 hover-bg-light transition-base">
                            <div class="d-flex w-100 align-items-center">
                                <div class="flex-shrink-0 me-3 text-center" style="width: 50px;">
                                    <span class="d-block fw-bold text-dark h5 mb-0"><?= date('d', strtotime($act['tanggal'])); ?></span>
                                    <span class="d-block small text-muted text-uppercase" style="font-size: 10px;"><?= date('M', strtotime($act['tanggal'])); ?></span>
                                </div>
                                <div class="vr me-3 opacity-25"></div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-bold text-dark"><?= esc($act['nama_aktivitas']); ?></h6>
                                    <p class="mb-0 text-muted small line-clamp-1"><?= strip_tags(esc($act['keterangan'])); ?></p>
                                </div>
                                <i class="bi bi-chevron-right text-muted small opacity-50"></i>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>
