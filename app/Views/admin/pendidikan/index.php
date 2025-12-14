<?= $this->extend('layout/admin_template'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0"><?= $title; ?></h3>
    <a href="<?= base_url('admin/pendidikan/create'); ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Pendidikan</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenjang</th>
                        <th scope="col">Nama Sekolah</th>
                        <th scope="col">Tahun Masuk</th>
                        <th scope="col">Tahun Lulus</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pendidikan as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><span class="badge bg-secondary"><?= $p['jenjang']; ?></span></td>
                            <td><?= $p['nama_sekolah']; ?></td>
                            <td><?= $p['tahun_masuk']; ?></td>
                            <td><?= $p['tahun_lulus']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/pendidikan/edit/' . $p['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('admin/pendidikan/delete/' . $p['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirmDelete()">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
