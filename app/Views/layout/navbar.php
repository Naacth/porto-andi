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
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <!-- <a class="nav-link px-3 btn btn-primary text-white rounded-pill ms-lg-3 shadow-sm" href="<?= base_url('/login'); ?>">Login</a> -->
        </li>
      </ul>
    </div>
  </div>
</nav>
