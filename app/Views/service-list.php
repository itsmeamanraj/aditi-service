<?= $this->include('include/header') ?>
<!-- Main Login Content -->
<div class="container" style="padding: 2rem 1rem;">
    <div class="row g-4">
        <?php foreach($service as $services){ ?>
            <div class="col-12 col-md-6">
                <div class="p-4 card-custom">
                    <h5 class="mb-3">Project ID : <?= $services['project_id'] ?> </h5>

                    <p><strong>Service : </strong><?= $services['service_name'] ?></p>
                    <p>
                        <strong>Website : </strong>
                        <a href="https://example.com" target="_blank"><?= $services['website_url'] ?></a>
                    </p>

                    <p>
                        <strong>WhatsApp : </strong>
                        <a href="https://wa.me/<?= $services['whatsapp_number'] ?>" class="text-success text-decoration-none" target="_blank">
                            <img src="https://cdn.jsdelivr.net/npm/bootstrap-icons/icons/whatsapp.svg" alt="WhatsApp"
                                width="20" style="margin-bottom: 4px" />
                            Chat Now
                        </a>
                    </p>

                    <div class="mt-3">
                        <a href="<?= base_url('servicedetail/'.$services['service_id']) ?>" class="btn btn-custom">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-info-circle me-1" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 .888-.252 1.008-.598l.088-.416c.02-.097.04-.161.06-.2.07-.12.178-.208.319-.264l.088-.032.088-.032-.088-.032c-.14-.056-.248-.144-.319-.264-.02-.039-.04-.103-.06-.2l-.088-.416c-.12-.346-.463-.598-1.008-.598-.703 0-1.002.422-.808 1.319l.738 3.468c.064.293.006.4-.288.469l-.45.083.082.38 2.29.287z" />
                                <circle cx="8" cy="4.5" r="1" />
                            </svg>
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?= $this->include('include/footer') ?>