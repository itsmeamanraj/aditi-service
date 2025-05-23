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
        <div class="card-body">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th scope="col">1</th>
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
                        <td> <?= $user['created_at'] ?> </td>
                        <td>
                            <a href="<?= base_url('admin/services/edit-services/' . $user['user_id']) ?>"
                                class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                            </a>
                            <a href="<?= base_url('admin/edit-user/' . $user['user_id']) ?>"
                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            <a href="<?= base_url('admin/delete-user/' . $user['user_id']) ?>"
                                class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                            </a>
                        </td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('admin/include/footer') ?>