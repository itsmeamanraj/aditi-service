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
            <ul class="nav nav-tabs mt-4 tabs-container" id="projectTabs" role="tablist">
                <?php foreach ($getTabServicecontet as $index => $tab) : ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?= $index === 0 ? 'active' : '' ?>"
                            id="tab-<?= $tab->tab_id ?>-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#tab-<?= $tab->tab_id ?>"
                            type="button"
                            role="tab"
                            aria-controls="tab-<?= $tab->tab_id ?>"
                            aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
                            <?= esc($tab->tab_name) ?>
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="tab-content mt-3" id="projectTabsContent">
                <?php foreach ($getTabServicecontet as $index => $tab) : ?>
                    <?php
                    // Allow only <img> and <a> tags; strip others
                    $allowedHtml = $tab->user_input;
                    ?>
                    <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>"
                        id="tab-<?= $tab->tab_id ?>"
                        role="tabpanel"
                        aria-labelledby="tab-<?= $tab->tab_id ?>-tab">
                        <?= $allowedHtml ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p class="mt-3 text-muted">No tab content available for this project.</p>
        <?php endif; ?>

    </div>
</div>

<?= $this->include('include/footer') ?>