<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1"><?= $title; ?></h3>
        <p class="text-muted small mb-0">Manage your educational background items</p>
    </div>
    <a href="<?= base_url('admin/pendidikan/create'); ?>" class="btn btn-primary rounded-pill px-4 shadow-sm">
        <i class="bi bi-plus-lg me-1"></i> Tambah Pendidikan
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase small fw-bold text-muted" width="50">#</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Jenjang</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Nama Sekolah / Institusi</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Periode</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($pendidikan)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-inbox display-4 d-block mb-3 opacity-25"></i>
                                    <p>Belum ada data pendidikan.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $i = 1; ?>
                        <?php foreach ($pendidikan as $p) : ?>
                            <tr>
                                <td class="ps-4"><?= $i++; ?></td>
                                <td>
                                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3"><?= $p['jenjang']; ?></span>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark"><?= $p['nama_sekolah']; ?></div>
                                </td>
                                <td>
                                    <div class="small text-muted">
                                        <i class="bi bi-calendar3 me-1"></i> <?= $p['tahun_masuk']; ?> — <?= $p['tahun_lulus']; ?>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group shadow-sm rounded-3 overflow-hidden">
                                        <a href="<?= base_url('admin/pendidikan/edit/' . $p['id']); ?>" class="btn btn-white btn-sm border-end" title="Edit">
                                            <i class="bi bi-pencil-square text-warning"></i>
                                        </a>
                                        <a href="<?= base_url('admin/pendidikan/delete/' . $p['id']); ?>" class="btn btn-white btn-sm" onclick="return confirmDelete()" title="Delete">
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
