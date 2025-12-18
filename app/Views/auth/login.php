<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="row justify-content-center align-items-center" style="min-height: 85vh;">
    <div class="col-md-5 col-lg-4">
        <div class="card glass border-0 rounded-4 shadow-lg fade-in-up">
            <div class="card-body p-5">
                <div class="text-center mb-5">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 70px; height: 70px;">
                        <i class="bi bi-shield-lock-fill fs-2"></i>
                    </div>
                    <h3 class="fw-bold text-gradient">Admin Login</h3>
                    <p class="text-muted small">Sign in to manage your portfolio</p>
                </div>
                
                <?php if(session()->getFlashdata('message')) : ?>
                    <div class="alert alert-danger border-0 rounded-3 small shadow-sm mb-4" role="alert">
                         <i class="bi bi-exclamation-circle-fill me-2"></i><?= session()->getFlashdata('message'); ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('/auth/attemptLogin'); ?>" method="post">
                    <?= csrf_field(); ?>
                    
                    <div class="mb-3">
                        <label for="username" class="form-label small text-muted text-uppercase fw-bold ls-1">Username</label>
                        <div class="input-group shadow-sm">
                             <span class="input-group-text bg-white border-end-0 py-2 rounded-start-3"><i class="bi bi-person text-primary"></i></span>
                             <input type="text" class="form-control border-start-0 py-2 rounded-end-3" id="username" name="username" placeholder="Username" value="<?= old('username'); ?>" required autofocus>
                        </div>
                    </div>

                    <div class="mb-4">
                         <label for="password" class="form-label small text-muted text-uppercase fw-bold ls-1">Password</label>
                         <div class="input-group shadow-sm">
                             <span class="input-group-text bg-white border-end-0 py-2 rounded-start-3"><i class="bi bi-key text-primary"></i></span>
                             <input type="password" class="form-control border-start-0 border-end-0 py-2" id="password" name="password" placeholder="Password" required>
                             <button class="btn btn-white border border-start-0 py-2 rounded-end-3 text-muted" type="button" id="togglePassword">
                                <i class="bi bi-eye-slash-fill"></i>
                             </button>
                        </div>
                    </div>

                    <div class="d-grid gap-2 mb-4">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold shadow">
                            Sign In <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
                    
                    <div class="text-center pt-2">
                        <a href="<?= base_url('/'); ?>" class="text-decoration-none small text-muted hover-link transition-base">
                            <i class="bi bi-arrow-left me-1"></i> Back to Website
                        </a>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="text-center mt-4 fade-in-up delay-200">
            <p class="text-muted small opacity-50">&copy; <?= date('Y'); ?> MyProfile Admin Portal</p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye-fill');
            this.querySelector('i').classList.toggle('bi-eye-slash-fill');
        });
    });
</script>
<?= $this->endSection(); ?>
