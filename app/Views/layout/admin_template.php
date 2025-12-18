<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Admin Panel'; ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
      :root {
        --primary-color: #6366f1;
        --secondary-color: #ec4899;
        --sidebar-width: 260px;
        --topbar-height: 70px;
        --glass-bg: rgba(255, 255, 255, 0.8);
      }
      
      body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f8fafc;
        overflow-x: hidden;
      }

      /* Sidebar */
      .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        width: var(--sidebar-width);
        padding: 0;
        background: #1e293b;
        background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        box-shadow: 4px 0 24px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
      }
      
      .sidebar-brand {
        height: var(--topbar-height);
        display: flex;
        align-items: center;
        padding: 0 1.5rem;
        color: white;
        font-weight: 700;
        font-size: 1.25rem;
        background: rgba(0,0,0,0.1);
        text-decoration: none;
      }

      .nav-link {
        color: rgba(255,255,255,0.7);
        padding: 0.8rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.2s;
        border-left: 3px solid transparent;
      }
      
      .nav-link:hover, .nav-link.active {
        color: white;
        background: rgba(255,255,255,0.05);
      }
      
      .nav-link.active {
        border-left-color: var(--primary-color);
        background: linear-gradient(90deg, rgba(99, 102, 241, 0.1) 0%, transparent 100%);
      }
      
      .nav-link i {
        font-size: 1.1rem;
      }

      /* Main Content */
      .main-content {
        margin-left: var(--sidebar-width);
        padding-top: var(--topbar-height);
        min-height: 100vh;
        transition: all 0.3s ease;
      }

      /* Topbar */
      .topbar {
        position: fixed;
        top: 0;
        right: 0;
        left: var(--sidebar-width);
        height: var(--topbar-height);
        z-index: 99;
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(0,0,0,0.05);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 2rem;
        transition: all 0.3s ease;
      }

      /* Cards */
      .card {
        border: none;
        border-radius: 1rem;
        background: white;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
      }
      
      /* Buttons */
      .btn-primary {
         background: linear-gradient(135deg, var(--primary-color), #4f46e5);
         border: none;
         box-shadow: 0 4px 6px -1px rgba(99, 102, 241, 0.3);
      }
      .btn-primary:hover {
         background: linear-gradient(135deg, #4f46e5, var(--primary-color));
         transform: translateY(-1px);
         box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.4);
      }
      
      .btn-secondary {
         background: linear-gradient(135deg, var(--secondary-color), #db2777);
         border: none;
         box-shadow: 0 4px 6px -1px rgba(236, 72, 153, 0.3);
      }
      .btn-secondary:hover {
         background: linear-gradient(135deg, #db2777, var(--secondary-color));
         transform: translateY(-1px);
         box-shadow: 0 10px 15px -3px rgba(236, 72, 153, 0.4);
      }

      /* Animations */
      .animate { animation-duration: 0.3s; animation-fill-mode: both; }
      @keyframes slideIn {
        from { transform: translateY(1rem); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
      }
      .slideIn { animation-name: slideIn; }

      .text-gradient {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }
      
      /* Mobile Toggle */
      @media (max-width: 991.98px) {
        .sidebar {
            transform: translateX(-100%);
        }
        .sidebar.show {
            transform: translateX(0);
        }
        .main-content, .topbar {
            margin-left: 0;
            left: 0;
        }
      }
    </style>
  </head>
  <body>
    
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
       <a href="<?= base_url('/admin'); ?>" class="sidebar-brand">
           <i class="bi bi-shield-lock-fill text-primary me-2"></i> Admin Panel
       </a>
       <div class="py-3">
           <small class="text-uppercase text-muted fw-bold px-4 mb-2 d-block" style="font-size: 0.75rem;">Main Menu</small>
           <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link <?= (url_is('admin') || url_is('admin/dashboard')) ? 'active' : ''; ?>" href="<?= base_url('/admin'); ?>">
                  <i class="bi bi-grid-fill"></i> Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= (url_is('admin/biodata*')) ? 'active' : ''; ?>" href="<?= base_url('/admin/biodata'); ?>">
                  <i class="bi bi-person-badge"></i> Biodata
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= (url_is('admin/pendidikan*')) ? 'active' : ''; ?>" href="<?= base_url('/admin/pendidikan'); ?>">
                  <i class="bi bi-mortarboard"></i> Pendidikan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= (url_is('admin/aktivitas*')) ? 'active' : ''; ?>" href="<?= base_url('/admin/aktivitas'); ?>">
                  <i class="bi bi-activity"></i> Aktivitas
                </a>
              </li>
           </ul>

           <small class="text-uppercase text-muted fw-bold px-4 mt-4 mb-2 d-block" style="font-size: 0.75rem;">System</small>
           <ul class="nav flex-column">
               <li class="nav-item">
                <a class="nav-link text-danger" href="<?= base_url('/logout'); ?>">
                  <i class="bi bi-box-arrow-right"></i> Sign Out
                </a>
              </li>
           </ul>
       </div>
    </nav>

    <!-- Topbar -->
    <header class="topbar">
        <button class="btn btn-link text-dark p-0 d-lg-none" id="sidebarToggle">
            <i class="bi bi-list fs-4"></i>
        </button>
        <div class="d-flex align-items-center ms-auto">
             <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <span class="d-none d-md-block fw-medium small">Administrator</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg animate slideIn">
                    <li><a class="dropdown-item" href="<?= base_url('/'); ?>"><i class="bi bi-layout-text-window-reverse me-2"></i> View Site</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="<?= base_url('/logout'); ?>"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container-fluid p-4">
            <?php if(session()->getFlashdata('message')) : ?>
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('message'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content'); ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Toggle Sidebar
      document.getElementById('sidebarToggle').addEventListener('click', function() {
          document.getElementById('sidebar').classList.toggle('show');
      });
      
      // Confirmation Box
      function confirmDelete() {
        return confirm("Are you sure you want to delete this item?");
      }
    </script>
  </body>
</html>
