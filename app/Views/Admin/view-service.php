<?= $this->include('admin/include/header') ?>

<style>
:root {
  --white: #ffffff;
  --off-white: #f4f6f8;
  --dark-blue: #1a2e45;
  --dark-green: #1e4d3a;
  --dark-red: #8b1e3f;
  --cream: #dabfac;
}

.btn-custom {
  background-color: var(--dark-red);
  color: var(--white);
}
.btn-custom:hover {
  background-color: var(--dark-blue);
  color: var(--white);
}

.project-title {
  color: var(--dark-blue);
  font-size: 2rem;
  font-weight: bold;
}

.project-id {
  color: #000;
  font-size: 1.5rem;
}

.client-info p {
  margin: 0.25rem 0;
  color: var(--dark-blue);
  font-weight: 500;
}

.nav-tabs .nav-link {
  color: #000;
  border: 1px solid var(--dark-blue);
  background-color: var(--white);
  margin-right: 5px;
}
.nav-tabs .nav-link.active {
  background-color: var(--cream);
  color: #000;
  border-color: var(--cream);
}

.tab-content {
  padding: 1rem;
  background-color: var(--white);
  border: 1px solid var(--dark-blue);
  border-top: none;
  border-radius: 0 0 8px 8px;
}
.tox-notifications-container{
    display:none;
}
</style>

<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Users</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="<?= base_url('admin/dashboard') ?>" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Service Details
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Users</li>
        </ul>
    </div>

    <div class="card basic-data-table">
        <div class="card-body">
            <div class="container mt-4">
                <div class="project-card">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?= base_url('admin/create-tab/') . service('uri')->setSilent()->getSegment(5); ?>" class="btn btn-custom radius-8 px-14 py-6 text-md">Create Tab</a>
                            <div class="project-title">Project</div>
                            <div class="project-id"><?= esc($service['project_id']) ?></div>
                        </div>
                        <div class="col-md-6 text-md-end client-info">
                            <p><strong>Name:</strong> <?= esc($service['name']) ?></p>
                            <p><strong>Website:</strong> <?= esc($service['website_url']) ?></p>
                            <p><strong>Service:</strong> <?= esc($service['service_name']) ?></p>
                        </div>
                    </div>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success mt-3">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?= base_url('admin/services/save_service_detailed') ?>" enctype="multipart/form-data">
                        <input type="hidden" name="service_id" value="<?= esc($service['service_id']) ?>">

                        <ul class="nav nav-tabs mt-4" id="projectTabs" role="tablist">
                            <?php foreach ($service_tab as $index => $tab): ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?= $index === 0 ? 'active' : '' ?>" id="tab-<?= $tab['id'] ?>-tab"
                                            data-bs-toggle="tab" data-bs-target="#tab-<?= $tab['id'] ?>"
                                            type="button" role="tab">
                                        <?= esc($tab['tab_name']) ?>
                                    </button>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="tab-content" id="projectTabsContent">
                            <?php foreach ($service_tab as $index => $tab): ?>
                                <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>" id="tab-<?= $tab['id'] ?>" role="tabpanel">
                                    <div class="mb-3 mt-3">
                                        <label>Content for <strong><?= esc($tab['tab_name']) ?></strong></label>
                                        <textarea class="form-control basic-conf" id="myeditorinstance" name="user_input[<?= $tab['id'] ?>]">
                                            <?= esc($getTabServicecontet[$tab['id']] ?? '') ?>
                                        </textarea>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('admin/include/footer') ?>
