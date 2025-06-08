<?= $this->include('admin/include/header') ?>
<!-- Main Login Content -->
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Users</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Service Listing
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
            <div class="row col-3">
                <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-success">
                    Add service
                </button>
            </div>
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Service Name</th>
                        <th scope="col">Project ID</th>
                        <th scope="col">Website URL</th>
                        <th scope="col">Whatsapp Number</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach ($service as $services) {
                    ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $services['service_name'] ?></td>
                        <td><?= $services['project_id'] ?></td>
                        <td><?= $services['website_url'] ?></td>
                        <td> <?= $services['whatsapp_number'] ?> </td>
                        <td><?=  (new DateTime($services['created_at']))->format('d M Y : g:i A'); ?> </td>
                        <td>
                            <a href="<?= base_url('admin/services/edit-tab-services/' . $services['service_id']) ?>"
                                class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                            </a>
                            <button type="button" data-toggle="modal" data-target="#modal<?= $services['service_id'] ?>"
                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </button>
                            <a href="<?= base_url('admin/services/delete-service/' . $services['service_id']) ?>"
                                class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal<?= $services['service_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?= $services['service_id'] ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="post" action="<?= base_url('admin/services/edit-service-list') ?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel<?= $services['service_id'] ?>">Edit Tab</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-12">
                                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                            <input type="hidden" name="service_id" value="<?= $services['service_id'] ?>">
                                            <label class="form-label">Service Name</label>
                                            <input type="text" name="servicename" class="form-control" value="<?= $services['service_name'] ?>" placeholder="Enter name" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Project ID</label>
                                            <input type="text" name="projectid" class="form-control" value="<?= $services['project_id'] ?>" placeholder="Enter id" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Website Url</label>
                                            <input type="url" name="url" class="form-control" value="<?= $services['website_url'] ?>"  placeholder="Enter url" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Whatsapp Number</label>
                                            <input type="number" name="mobile" class="form-control" value="<?= $services['whatsapp_number'] ?>" placeholder="Enter number" required>
                                        </div>
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

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="<?= base_url('admin/services/save-service') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add Services</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <input type="hidden" name="user_id" value="<?= $user_id ?>">
                        <label class="form-label">Service Name</label>
                        <input type="text" name="servicename" class="form-control" placeholder="Enter name" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Project ID</label>
                        <input type="text" name="projectid" class="form-control" placeholder="Enter id" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Website Url</label>
                        <input type="url" name="url" class="form-control"  placeholder="Enter url" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Whatsapp Number</label>
                        <input type="number" name="mobile" class="form-control" placeholder="Enter number" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->include('admin/include/footer') ?>