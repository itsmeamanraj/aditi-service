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
        <div class="card-body">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th scope="col">1</th>
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
                        <td> <?= $services['created_at'] ?> </td>
                        <td>
                            <a href="<?= base_url('admin/services/edit-tab-services/' . $services['service_id']) ?>"
                                class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                            </a>
                            <a href="<?= base_url('admin/services/edit-service-list' . $services['service_id']) ?>"
                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            <a href="<?= base_url('admin/services/delete-service/' . $services['service_id']) ?>"
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