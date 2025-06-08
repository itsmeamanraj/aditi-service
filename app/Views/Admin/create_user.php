<?= $this->include('admin/include/header') ?>
<!-- Main Login Content -->
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Users</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Create Tab
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Users</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-md-6">
            <div class="card">
                <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-info">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('admin/save-user') ?>" method="POST">
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-12">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">User Name</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Mobile</label>
                                <input type="number" name="mobile" class="form-control" placeholder="Enter number" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-success-600 radius-8 px-14 py-6 text-sm">Create User</button>
                        </div>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
    </div>
</div>

<?= $this->include('admin/include/footer') ?>