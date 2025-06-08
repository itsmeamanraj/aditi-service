<?= $this->include('admin/include/header') ?>
<!-- Main Login Content -->
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Users</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    User Listing
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Users</li>
        </ul>
    </div>

    <div class="card basic-data-table">
         <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-info">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach ($users as $user) {
                    ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['mobile'] ?></td>
                        <td><span  class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm"><?= $user['user_status'] ?></span></td>
                        <td> <?=  (new DateTime($user['created_at']))->format('d M Y : g:i A'); ?> </td>
                        <td>
                            <a href="<?= base_url('admin/services/edit-services/' . $user['user_id']) ?>"
                                class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                            </a>
                            <button type="button" data-toggle="modal" data-target="#modal<?= $user['user_id'] ?>"
                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </button>
                            <a href="<?= base_url('admin/delete-user/' . $user['user_id']) ?>"
                                class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal<?= $user['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?= $user['user_id'] ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="post" action="<?= base_url('admin/edit-user') ?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel<?= $user['user_id'] ?>">Edit Tab</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?= $user['user_id'] ?>">
                                        <div class="col-12">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" value="<?= $user['name'] ?>" placeholder="Enter name" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">User Name</label>
                                            <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>" placeholder="Enter username" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" placeholder="Enter Email" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Mobile</label>
                                            <input type="number" name="mobile" class="form-control" value="<?= $user['mobile'] ?>" placeholder="Enter number" required>
                                        </div>
                                        <!-- <div class="col-12">
                                            <label class="form-label">Password</label>
                                            <input type="text" name="password" class="form-control" value="<?= $user['password'] ?>" placeholder="Enter password" required>
                                        </div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('admin/include/footer') ?>