<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'My App'; ?></title>
    <link rel="icon" href="https://fav.farm/👨‍💻" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
      :root {
        /* Modern Vibrant Palette */
        --primary-color: #6366f1; /* Indigo 500 */
        --primary-dark: #4f46e5;  /* Indigo 600 */
        --secondary-color: #ec4899; /* Pink 500 */
        --accent-color: #8b5cf6; /* Violet 500 */
        
        --text-main: #1e293b;
        --text-muted: #64748b;
        
        --card-bg: rgba(255, 255, 255, 0.7);
        --glass-border: rgba(255, 255, 255, 0.5);
        --glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
      }

      body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f3f4f6;
        min-height: 100vh;
        color: var(--text-main);
        overflow-x: hidden;
      }
      
      /* Animated Mesh Gradient Background */
      .bg-animated {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: -1;
        background: 
            radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
            radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), 
            radial-gradient(at 100% 0%, hsla(339,49%,30%,1) 0, transparent 50%);
        background: 
            radial-gradient(at 40% 20%, rgba(99, 102, 241, 0.15) 0px, transparent 50%),
            radial-gradient(at 80% 0%, rgba(236, 72, 153, 0.15) 0px, transparent 50%),
            radial-gradient(at 0% 50%, rgba(139, 92, 246, 0.15) 0px, transparent 50%);
        background-size: 150% 150%;
        animation: gradientBG 15s ease infinite;
      }

      @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
      }

      /* Glassmorphism Utilities */
      .glass {
        background: var(--card-bg);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid var(--glass-border);
        box-shadow: var(--glass-shadow);
      }
      
      .glass-nav {
         background: rgba(255, 255, 255, 0.85);
         backdrop-filter: blur(20px);
         -webkit-backdrop-filter: blur(20px);
         border-bottom: 1px solid rgba(255,255,255,0.4);
         box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
      }

      /* Card & Element Styles */
      .hover-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      }
      .hover-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px -5px rgba(0, 0, 0, 0.1);
        border-color: rgba(255,255,255,0.8);
      }

      .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        border: none;
        box-shadow: 0 4px 6px -1px rgba(99, 102, 241, 0.4);
      }
      
      .btn-primary:hover {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
        transform: translateY(-1px);
        box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.5);
      }

      .text-gradient {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }

      /* Animations */
      .fade-in-up {
        animation: fadeInUp 0.8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
        opacity: 0;
        transform: translateY(20px);
      }
      
      @keyframes fadeInUp {
        to { opacity: 1; transform: translateY(0); }
      }
      
      .delay-100 { animation-delay: 0.1s; }
      .delay-200 { animation-delay: 0.2s; }
      .delay-300 { animation-delay: 0.3s; }

      .hover-link {
        transition: all 0.3s ease;
        position: relative;
      }
      .hover-link:hover {
        color: var(--primary-color) !important;
      }
      
      .spacing-1 { letter-spacing: 1px; }
      
      .transition-base {
        transition: all 0.3s ease;
      }

      /* Scrollbar */
      ::-webkit-scrollbar {
        width: 10px;
      }
      ::-webkit-scrollbar-track {
        background: #f1f1f1;
      }
      ::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, var(--primary-color), var(--secondary-color));
        border-radius: 10px;
        border: 2px solid #f1f1f1;
      }
      ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(180deg, var(--primary-dark), var(--secondary-color));
      }
    </style>
  </head>
  <body>
    
    <div class="bg-animated"></div>

    <?= $this->include('layout/navbar'); ?>

    <div class="container py-5 mt-5 content-wrapper" style="min-height: 80vh;">
        <?php if(session()->getFlashdata('message')) : ?>
            <div class="alert alert-success glass border-0 text-success fw-medium shadow-sm fade-in-up" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('message'); ?>
            </div>
        <?php endif; ?>
         <?= $this->renderSection('content'); ?>
    </div>

    <footer class="mt-auto py-5 border-top border-white glass position-relative">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3 d-flex align-items-center">
                        <span class="bg-primary text-white rounded p-1 me-2"><i class="bi bi-person-badge-fill"></i></span>
                        <span class="text-gradient">MyProfile</span>
                    </h5>
                    <p class="text-muted small lh-lg">
                        Platform personal profesional untuk menampilkan jejak rekam, pencapaian, dan aktivitas. 
                        Dibangun dengan teknologi web modern untuk performa dan estetika terbaik.
                    </p>
                </div>
                <div class="col-lg-2 col-6 mb-4 mb-md-0">
                    <h6 class="text-uppercase fw-bold mb-4 small text-primary spacing-1">Navigasi</h6>
                    <ul class="list-unstyled mb-0 d-grid gap-2">
                        <li><a href="<?= base_url('/'); ?>" class="text-muted text-decoration-none small hover-link">Home</a></li>
                        <li><a href="<?= base_url('/pendidikan'); ?>" class="text-muted text-decoration-none small hover-link">Pendidikan</a></li>
                        <li><a href="<?= base_url('/aktivitas'); ?>" class="text-muted text-decoration-none small hover-link">Aktivitas</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6 mb-4 mb-md-0">
                    <h6 class="text-uppercase fw-bold mb-4 small text-primary spacing-1">Admin</h6>
                    <ul class="list-unstyled mb-0 d-grid gap-2">
                         <li><a href="<?= base_url('/login'); ?>" class="text-muted text-decoration-none small hover-link">Login</a></li>
                         <li><a href="<?= base_url('/admin'); ?>" class="text-muted text-decoration-none small hover-link">Dashboard</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12">
                     <h6 class="text-uppercase fw-bold mb-4 small text-primary spacing-1">Connect</h6>
                     <?php 
                        $dbBiodata = (new \App\Models\BiodataModel())->first();
                     ?>
                     <div class="d-flex gap-3">
                        <?php if(!empty($dbBiodata['link_github'])): ?>
                            <a href="<?= $dbBiodata['link_github']; ?>" target="_blank" class="btn btn-sm btn-light rounded-circle shadow-sm" style="width: 38px; height: 38px; display: grid; place-items: center;"><i class="bi bi-github fs-5"></i></a>
                        <?php endif; ?>
                        <?php if(!empty($dbBiodata['link_linkedin'])): ?>
                            <a href="<?= $dbBiodata['link_linkedin']; ?>" target="_blank" class="btn btn-sm btn-light rounded-circle shadow-sm" style="width: 38px; height: 38px; display: grid; place-items: center; color: #0077b5;"><i class="bi bi-linkedin fs-5"></i></a>
                        <?php endif; ?>
                        <?php if(!empty($dbBiodata['link_instagram'])): ?>
                            <a href="<?= $dbBiodata['link_instagram']; ?>" target="_blank" class="btn btn-sm btn-light rounded-circle shadow-sm" style="width: 38px; height: 38px; display: grid; place-items: center; color: #e1306c;"><i class="bi bi-instagram fs-5"></i></a>
                        <?php endif; ?>
                        <?php if(!empty($dbBiodata['link_twitter'])): ?>
                            <a href="<?= $dbBiodata['link_twitter']; ?>" target="_blank" class="btn btn-sm btn-light rounded-circle shadow-sm" style="width: 38px; height: 38px; display: grid; place-items: center; color: #1da1f2;"><i class="bi bi-twitter-x fs-5"></i></a>
                        <?php endif; ?>
                     </div>
                </div>
            </div>
            
            <div class="border-top border-secondary border-opacity-10 mt-5 pt-4">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="text-muted small mb-0">&copy; <?= date('Y'); ?> MyProfile. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                        <small class="text-muted">Built with <i class="bi bi-heart-fill text-danger mx-1"></i> & CodeIgniter 4</small>
                    </div>
                </div>
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
