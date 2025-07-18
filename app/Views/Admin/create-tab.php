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
                <form action="<?= base_url('admin/save-tab') ?>" method="POST">
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-12">
                                <label class="form-label">Tab Name</label>
                                <input type="text" name="tab_name" class="form-control" placeholder="Enter tab name" required>
                                <input type="hidden" name="user_id" class="form-control" value= <?= $user_id?>>
                            </div>
                            <button type="submit" class="btn btn-success-600 radius-8 px-14 py-6 text-sm">Create tab</button>
                        </div>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-12">
                            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tab Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($tabs as $tab) {
                                    ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $tab['tab_name'] ?></td>
                                        <td><?= date('d M Y h:i A', strtotime($tab['created_at'])); ?></td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#modal<?= $tab['id'] ?>"
                                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                <iconify-icon icon="lucide:edit"></iconify-icon>
                                            </button>
                                            <a href="<?= base_url('admin/delete-tab/' . $tab['id']) ?>"
                                                class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center" onclick="return confirm('Are you sure you want to delete this service?');">
                                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Modal ko yahin likho, lekin <tr> ke bahar -->
                                    <div class="modal fade" id="modal<?= $tab['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?= $tab['id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form method="post" action="<?= base_url('admin/edit-tab') ?>">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel<?= $tab['id'] ?>">Edit Tab</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?= $tab['id'] ?>">
                                                        <label class="form-label">Tab Name</label>
                                                        <input type="text" name="tab_name" class="form-control" value="<?= $tab['tab_name'] ?>" required>
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
            </div><!-- card end -->
        </div>
    </div>
</div>

<?= $this->include('admin/include/footer') ?>