<!-- Main Login Content -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= esc($title ?? 'Login Page') ?></title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>
<body>
  <div class="wrapper">
    <!-- Navbar -->
    <main>
        <div class="login-box text-center">
            <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
            <?php endif; ?>
            <img src="https://cdn-icons-png.flaticon.com/512/942/942748.png" alt="Login Icon" class="login-icon">

            <h4 class="mb-4">Login to Your Account</h4>

            <form action="<?= base_url('admin/login/auth') ?>" method="post">
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
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
