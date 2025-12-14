<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-5 col-lg-4">
        <div class="card glass border-0 rounded-4 shadow-lg">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-shield-lock-fill fs-3"></i>
                    </div>
                    <h4 class="fw-bold">Admin Login</h4>
                    <p class="text-muted small">Please sign in to continue</p>
                </div>
                
                <?php if(session()->getFlashdata('message')) : ?>
                    <div class="alert alert-danger rounded-3 small" role="alert">
                         <i class="bi bi-exclamation-circle-fill me-2"></i><?= session()->getFlashdata('message'); ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('/auth/attemptLogin'); ?>" method="post">
                    <?= csrf_field(); ?>
                    
                    <div class="mb-3">
                        <label for="username" class="form-label small text-muted text-uppercase fw-bold">Username</label>
                        <div class="input-group">
                             <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                             <input type="text" class="form-control bg-light border-start-0 ps-0" id="username" name="username" placeholder="Enter username" value="<?= old('username'); ?>" required autofocus>
                        </div>
                    </div>

                    <div class="mb-4">
                         <label for="password" class="form-label small text-muted text-uppercase fw-bold">Password</label>
                         <div class="input-group">
                             <span class="input-group-text bg-light border-end-0"><i class="bi bi-key text-muted"></i></span>
                             <input type="password" class="form-control bg-light border-start-0 border-end-0 ps-0" id="password" name="password" placeholder="Enter password" required>
                             <button class="btn btn-light border bg-light border-start-0 text-muted" type="button" id="togglePassword">
                                <i class="bi bi-eye-slash-fill"></i>
                             </button>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg rounded-3 fw-bold shadow-sm">
                            Sign In <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="<?= base_url('/'); ?>" class="text-decoration-none small text-muted"><i class="bi bi-arrow-left me-1"></i> Back to Website</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.querySelector('i').classList.toggle('bi-eye-fill');
            this.querySelector('i').classList.toggle('bi-eye-slash-fill');
        });
    });
</script>
<?= $this->endSection(); ?>
