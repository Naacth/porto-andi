<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Admin Panel'; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
      .sidebar {
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 100;
        padding: 48px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
      }
      .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto;
      }
      
      main {
        margin-left: 240px; /* Width of sidebar */
        padding: 2rem;
      }
      
      @media (max-width: 767.98px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        main {
            margin-left: 0;
        }
      }
    </style>
  </head>
  <body>
    
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Biodata Admin</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3 sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link <?= (url_is('admin') || url_is('admin/dashboard')) ? 'active' : ''; ?>" aria-current="page" href="<?= base_url('/admin'); ?>">
                  <i class="bi bi-speedometer2 me-2"></i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= (url_is('admin/biodata*')) ? 'active' : ''; ?>" href="<?= base_url('/admin/biodata'); ?>">
                  <i class="bi bi-person-lines-fill me-2"></i>
                  Biodata
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= (url_is('admin/aktivitas*')) ? 'active' : ''; ?>" href="<?= base_url('/admin/aktivitas'); ?>">
                  <i class="bi bi-activity me-2"></i>
                  Aktivitas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= (url_is('admin/pendidikan*')) ? 'active' : ''; ?>" href="<?= base_url('/admin/pendidikan'); ?>">
                  <i class="bi bi-mortarboard me-2"></i>
                  Pendidikan
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Account</span>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link text-danger" href="<?= base_url('/logout'); ?>">
                  <i class="bi bi-box-arrow-right me-2"></i>
                  Sign out
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php if(session()->getFlashdata('message')) : ?>
                <div class="alert alert-success mt-3" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>

            <div class="pt-3">
                 <?= $this->renderSection('content'); ?>
            </div>
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      function confirmDelete() {
        return confirm("Are you sure you want to delete this item?");
      }
    </script>
  </body>
</html>
