<nav class="navbar navbar-expand-lg fixed-top glass-nav">
  <div class="container">
    <a class="navbar-brand fw-bold text-primary" href="<?= base_url('/'); ?>">
        <i class="bi bi-person-badge-fill me-2"></i>MyProfile
    </a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link px-3 <?= url_is('/') ? 'active fw-semibold text-primary' : ''; ?>" href="<?= base_url('/'); ?>">Biodata</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 <?= url_is('pendidikan*') ? 'active fw-semibold text-primary' : ''; ?>" href="<?= base_url('/pendidikan'); ?>">Pendidikan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-3 <?= url_is('aktivitas*') ? 'active fw-semibold text-primary' : ''; ?>" href="<?= base_url('/aktivitas'); ?>">Aktivitas</a>
        </li>
      </ul>
      <?php if(session()->get('isLoggedIn')): ?>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin Panel
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= base_url('/admin'); ?>">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= base_url('/admin/biodata'); ?>">Manage Biodata</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/admin/aktivitas'); ?>">Manage Aktivitas</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/admin/pendidikan'); ?>">Manage Pendidikan</a></li>
            <li><hr class="dropdown-divider"></li>
             <li><a class="dropdown-item text-danger" href="<?= base_url('/logout'); ?>">Logout</a></li>
          </ul>
        </li>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</nav>
