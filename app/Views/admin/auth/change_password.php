<?= view('admin/header', ['title' => 'Change Password']) ?>
<div class="content">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 text-primary"><i class="fa fa-shield-alt me-2"></i>Security Settings</h5>
                </div>
                <div class="card-body p-4">
                       <?php if (session()->getFlashdata('success')): ?>
                                <div class="alert alert-success mb-4">
                                    <?= session()->getFlashdata('success'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger mb-4">
                                    <?= session()->getFlashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <?php if (session()->has('errors')): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0 small">
                                <?php foreach (session('errors') as $error): ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/auth/change_password') ?>" method="POST">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Current Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fa fa-lock text-muted"></i></span>
                                <input type="password" name="current_password" class="form-control border-start-0 ps-0" placeholder="Enter current password" required>
                            </div>
                        </div>

                        <hr class="my-4 text-light">

                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">New Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fa fa-key text-muted"></i></span>
                                <input type="password" name="password" id="new_pass" class="form-control border-start-0 ps-0" placeholder="New password (min 6 chars)" required>
                                <button class="btn btn-light border" type="button" onclick="toggleVisibility('new_pass')">
                                    <i class="fa fa-eye text-muted" id="new_pass_icon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-muted small fw-bold">Confirm New Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fa fa-check text-muted"></i></span>
                                <input type="password" name="confirm_password" id="conf_pass" class="form-control border-start-0 ps-0" placeholder="Repeat new password" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 fw-bold shadow-sm">
                                Save Changes
                            </button>
                            <a href="<?= base_url('admin/contact_list') ?>" class="btn btn-link text-muted btn-sm text-decoration-none">Cancel and Return</a>
                        </div>
                    </form>

                </div>
            </div>
            
            <div class="text-center mt-4">
                <p class="text-muted small">Account: <strong><?= session()->get('user_email') ?></strong></p>
            </div>
        </div>
    </div>
</div>
</div>

<script>
function toggleVisibility(id) {
    const input = document.getElementById(id);
    const icon = document.getElementById(id + '_icon');
    if (input.type === "password") {
        input.type = "text";
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = "password";
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>

<?= view('admin/footer') ?>