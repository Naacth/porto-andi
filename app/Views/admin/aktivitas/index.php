<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0"><?= $title; ?></h3>
    <a href="<?= base_url('admin/aktivitas/create'); ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Aktivitas</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama Aktivitas</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($aktivitas as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $a['tanggal']; ?></td>
                            <td><?= $a['nama_aktivitas']; ?></td>
                            <td><?= $a['keterangan']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/aktivitas/edit/' . $a['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('admin/aktivitas/delete/' . $a['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirmDelete()">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
