<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'My App'; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
      :root {
        --primary-color: #4f46e5; /* Indigo 600 */
        --primary-light: #818cf8; /* Indigo 400 */
        --secondary-color: #ec4899; /* Pink 500 */
        --bg-gradient-start: #f8fafc;
        --bg-gradient-end: #e2e8f0;
        --card-bg: rgba(255, 255, 255, 0.85);
        --glass-border: rgba(255, 255, 255, 0.4);
      }

      body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: linear-gradient(135deg, var(--bg-gradient-start) 0%, var(--bg-gradient-end) 100%);
        min-height: 100vh;
        color: #334155;
      }

      /* Glassmorphism Utilities */
      .glass {
        background: var(--card-bg);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid var(--glass-border);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
      }
      
      .glass-nav {
         background: rgba(255, 255, 255, 0.8);
         backdrop-filter: blur(16px);
         border-bottom: 1px solid rgba(255,255,255,0.3);
      }

      /* Card Hover Effects */
      .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.1);
      }

      /* Animations */
      @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
      }
      
      .fade-in-up {
        animation: fadeIn 0.6s ease-out forwards;
      }
      
      .delay-100 { animation-delay: 0.1s; }
      .delay-200 { animation-delay: 0.2s; }
      .delay-300 { animation-delay: 0.3s; }
    </style>
  </head>
  <body>
    
    <?= $this->include('layout/navbar'); ?>

    <div class="container py-5 mt-5">
        <?php if(session()->getFlashdata('message')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('message'); ?>
            </div>
        <?php endif; ?>
         <?= $this->renderSection('content'); ?>
    </div>

    <footer class="mt-auto py-5 glass border-top border-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-primary fw-bold mb-3"><i class="bi bi-person-badge-fill me-2"></i>MyProfile</h5>
                    <p class="text-muted small">
                        Platform personal untuk menampilkan biodata, riwayat pendidikan, dan catatan aktivitas harian secara profesional dan modern.
                    </p>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h6 class="text-uppercase fw-bold mb-3 small text-secondary">Menu</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="<?= base_url('/'); ?>" class="text-muted text-decoration-none small hover-link">Biodata</a></li>
                        <li class="mb-2"><a href="<?= base_url('/pendidikan'); ?>" class="text-muted text-decoration-none small hover-link">Pendidikan</a></li>
                        <li class="mb-2"><a href="<?= base_url('/aktivitas'); ?>" class="text-muted text-decoration-none small hover-link">Aktivitas</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h6 class="text-uppercase fw-bold mb-3 small text-secondary">Connect</h6>
                    <?php 
                        // Fetch social links directly for layout
                        $dbBiodata = (new \App\Models\BiodataModel())->first();
                    ?>
                    <div class="d-flex gap-3">
                        <?php if(!empty($dbBiodata['link_github'])): ?>
                            <a href="<?= $dbBiodata['link_github']; ?>" target="_blank" class="text-secondary fs-5 hover-scale"><i class="bi bi-github"></i></a>
                        <?php endif; ?>
                        <?php if(!empty($dbBiodata['link_linkedin'])): ?>
                            <a href="<?= $dbBiodata['link_linkedin']; ?>" target="_blank" class="text-primary fs-5 hover-scale"><i class="bi bi-linkedin"></i></a>
                        <?php endif; ?>
                        <?php if(!empty($dbBiodata['link_instagram'])): ?>
                            <a href="<?= $dbBiodata['link_instagram']; ?>" target="_blank" class="text-danger fs-5 hover-scale"><i class="bi bi-instagram"></i></a>
                        <?php endif; ?>
                        <?php if(!empty($dbBiodata['link_twitter'])): ?>
                            <a href="<?= $dbBiodata['link_twitter']; ?>" target="_blank" class="text-info fs-5 hover-scale"><i class="bi bi-twitter-x"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-6">
                    <h6 class="text-uppercase fw-bold mb-3 small text-secondary">Newsletter</h6>
                    <p class="text-muted small mb-3">Dapatkan update terbaru.</p>
                     <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm" placeholder="Email address" aria-label="Email">
                        <button class="btn btn-primary btn-sm" type="button"><i class="bi bi-send"></i></button>
                    </div>
                </div>
            </div>
            
            <hr class="my-4 opacity-25">
            
            <div class="text-center text-muted small">
                &copy; <?= date('Y'); ?> MyProfile. Built with CodeIgniter 4 & Bootstrap 5.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      function confirmDelete() {
        return confirm("Are you sure you want to delete this item?");
      }
    </script>
  </body>
</html>
