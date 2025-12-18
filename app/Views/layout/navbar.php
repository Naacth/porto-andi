<nav class="navbar navbar-expand-lg fixed-top glass-nav py-3">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="<?= base_url('/'); ?>">
        <span class="bg-primary text-white rounded p-1"><i class="bi bi-person-badge-fill"></i></span>
        <span class="text-gradient">MyProfile</span>
    </a>
    <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-primary"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto algin-items-center">
        <li class="nav-item px-1">
          <a class="nav-link px-3 rounded-pill <?= url_is('/') ? 'active fw-semibold text-primary bg-primary bg-opacity-10' : 'text-muted'; ?>" href="<?= base_url('/'); ?>">
            Biodata
          </a>
        </li>
        <li class="nav-item px-1">
          <a class="nav-link px-3 rounded-pill <?= url_is('pendidikan*') ? 'active fw-semibold text-primary bg-primary bg-opacity-10' : 'text-muted'; ?>" href="<?= base_url('/pendidikan'); ?>">
            Pendidikan
          </a>
        </li>
        <li class="nav-item px-1">
          <a class="nav-link px-3 rounded-pill <?= url_is('aktivitas*') ? 'active fw-semibold text-primary bg-primary bg-opacity-10' : 'text-muted'; ?>" href="<?= base_url('/aktivitas'); ?>">
            Aktivitas
          </a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
            <a href="mailto:your.email@example.com" class="btn btn-primary btn-sm rounded-pill px-4 py-2 shadow-sm">
                Let's Talk <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
