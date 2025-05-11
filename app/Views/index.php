<?= $this->include('include/header') ?>
<!-- Main Login Content -->
<main>
    <div class="login-box text-center">
        <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
        <?php endif; ?>
        <img src="https://cdn-icons-png.flaticon.com/512/942/942748.png" alt="Login Icon" class="login-icon">

        <h4 class="mb-4">Login to Your Account</h4>

        <form action="<?= base_url('/login/auth') ?>" method="post">
            <div class="mb-3 text-start">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" class="form-control" name="username" placeholder="Enter your username">
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password"
                    placeholder="Enter your password">
            </div>

            <button type="submit" class="btn btn-login w-100">Login</button>
        </form>
    </div>
</main>

<?= $this->include('include/footer') ?>