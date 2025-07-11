<?= $this->include('include/header') ?>
<!-- Main Login Content -->

<?php
// print_r($getTabServicecontet);
// die;
?>
<div class="container mt-4">
    <div class="project-card">
        <div class="row">
            <div class="col-md-6">
                <div class="project-title">Project</div>
                <div class="project-id"><?= $service_detail['project_id'] ?></div>
            </div>
            <div class="col-md-6 text-md-end client-info">
                <p><strong>Name : </strong><?= session()->get('name') ?></p>
                <p><strong>Website : </strong><?= $service_detail['website_url'] ?></p>
                <p><strong>Service : </strong><?= $service_detail['service_name'] ?></p>
            </div>
        </div>

        <?php if (!empty($getTabServicecontet)) : ?>
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
        <?php else : ?>
            <p class="mt-3 text-muted">No tab content available for this project.</p>
        <?php endif; ?>

    </div>
</div>

<?= $this->include('include/footer') ?>