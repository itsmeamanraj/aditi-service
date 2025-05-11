<?= $this->include('include/header') ?>
<!-- Main Login Content -->
<div class="container mt-4">
    <div class="project-card">
        <div class="row">
            <div class="col-md-6">
                <div class="project-title">Project</div>
                <div class="project-id">#12345</div>
            </div>
            <div class="col-md-6 text-md-end client-info">
                <p><strong>Name:</strong> John Doe</p>
                <p><strong>Website:</strong> example.com</p>
                <p><strong>Service:</strong> Web Development</p>
            </div>
        </div>

        <ul class="nav nav-tabs mt-4 tabs-container" id="projectTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="client-tab" data-bs-toggle="tab" data-bs-target="#client"
                    type="button" role="tab">
                    About Client
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="website-tab" data-bs-toggle="tab" data-bs-target="#website" type="button"
                    role="tab">
                    About Website
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button"
                    role="tab">
                    Payment Status
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="access-tab" data-bs-toggle="tab" data-bs-target="#access" type="button"
                    role="tab">
                    Access We Have
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="files-tab" data-bs-toggle="tab" data-bs-target="#files" type="button"
                    role="tab">
                    Files
                </button>
            </li>
        </ul>

        <div class="tab-content" id="projectTabsContent">
            <div class="tab-pane fade show active" id="client" role="tabpanel">
                Client info content goes here.
            </div>
            <div class="tab-pane fade" id="website" role="tabpanel">
                Website details go here.
            </div>
            <div class="tab-pane fade" id="payment" role="tabpanel">
                Payment status content here.
            </div>
            <div class="tab-pane fade" id="access" role="tabpanel">
                Access info goes here.
            </div>
            <div class="tab-pane fade" id="files" role="tabpanel">
                File links or uploads go here.
            </div>
        </div>
    </div>
</div>

<?= $this->include('include/footer') ?>