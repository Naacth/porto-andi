<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1"><?= $title; ?></h3>
        <p class="text-muted small mb-0">Record and manage your daily professional activities</p>
    </div>
    <a href="<?= base_url('admin/aktivitas/create'); ?>" class="btn btn-secondary rounded-pill px-4 shadow-sm">
        <i class="bi bi-plus-lg me-1"></i> Tambah Aktivitas
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase small fw-bold text-muted" width="50">#</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted" width="150">Tanggal</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Aktivitas</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Keterangan</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($aktivitas)): ?>
                         <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-calendar-x display-4 d-block mb-3 opacity-25"></i>
                                    <p>Belum ada catatan aktivitas.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $i = 1; ?>
                        <?php foreach ($aktivitas as $a) : ?>
                            <tr>
                                <td class="ps-4"><?= $i++; ?></td>
                                <td>
                                    <div class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 px-3 py-2">
                                        <i class="bi bi-calendar-event me-1"></i> <?= date('d M Y', strtotime($a['tanggal'])); ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark"><?= $a['nama_aktivitas']; ?></div>
                                </td>
                                <td>
                                    <div class="small text-muted text-wrap" style="max-width: 300px;">
                                        <?= mb_strimwidth(strip_tags($a['keterangan']), 0, 100, "..."); ?>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                     <div class="btn-group shadow-sm rounded-3 overflow-hidden">
                                        <a href="<?= base_url('admin/aktivitas/edit/' . $a['id']); ?>" class="btn btn-white btn-sm border-end" title="Edit">
                                            <i class="bi bi-pencil-square text-warning"></i>
                                        </a>
                                        <a href="<?= base_url('admin/aktivitas/delete/' . $a['id']); ?>" class="btn btn-white btn-sm" onclick="return confirmDelete()" title="Delete">
                                            <i class="bi bi-trash3 text-danger"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
