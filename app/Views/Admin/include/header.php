<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wowdash - Bootstrap 5 Admin Dashboard HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/admin/images/favicon.png') ?>" sizes="16x16">

    <!-- remix icon font css  -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/remixicon.css') ?>">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/lib/bootstrap.min.css') ?>">
    <!-- Data Table css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/lib/dataTables.min.css') ?>">
    <!-- Text Editor css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/lib/editor-katex.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/lib/editor.atom-one-dark.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/lib/editor.quill.snow.css') ?>">
    <!-- Date picker css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/lib/flatpickr.min.css') ?>">
    <!-- Calendar css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/lib/full-calendar.css') ?>">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/lib/jquery-jvectormap-2.0.5.css') ?>">
    <!-- Popup css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/lib/magnific-popup.css') ?>">
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/lib/slick.css') ?>">
    <!-- prism css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/lib/prism.css') ?>">
    <!-- file upload css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/lib/file-upload.css') ?>">
    <!-- Audio Player css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/lib/audioplayer.css') ?>">
    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/style.css') ?>">
</head>

<body>
    <aside class="sidebar">
        <button type="button" class="sidebar-close-btn">
            <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
        </button>
        <div>
            <a href="index.html" class="sidebar-logo">
                <!-- <img src="../assets/admin/images/logo.png" alt="site logo" class="light-logo">
                <img src="../assets/admin/images/logo-light.png" alt="site logo" class="dark-logo">
                <img src="../assets/admin/images/logo-icon.png" alt="site logo" class="logo-icon"> -->
                <h4>LOGO</h4>
            </a>
        </div>
        <div class="sidebar-menu-area">
            <ul class="sidebar-menu" id="sidebar-menu">
                <li class="sidebar-menu-group-title">Application</li>
                <li>
                    <a href="<?= base_url('admin/dashboard') ?>">
                        <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                        <span>User Listing</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/create-user') ?>">
                        <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                        <span>Create User </span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/create-tab') ?>">
                        <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                        <span>Create Tab</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main class="dashboard-main">
        <div class="navbar-header">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="d-flex flex-wrap align-items-center gap-4">
                        <button type="button" class="sidebar-toggle">
                            <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
                            <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
                        </button>
                        <button type="button" class="sidebar-mobile-toggle">
                            <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                        </button>
                        
                    </div>
                </div>
                <div class="col-auto">
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <button type="button" data-theme-toggle
                            class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>
                
                        <div class="dropdown">
                            <button class="d-flex justify-content-center align-items-center rounded-circle"
                                type="button" data-bs-toggle="dropdown">
                                <img src="<?= base_url('assets/admin/images/user.png') ?>" alt="image"
                                    class="w-40-px h-40-px object-fit-cover rounded-circle">
                            </button>
                            <div class="dropdown-menu to-top dropdown-menu-sm">
                                <div
                                    class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        <h6 class="text-lg text-primary-light fw-semibold mb-2"><?= session()->get('username') ?></h6>
                                        <span class="text-secondary-light fw-medium text-sm">Admin</span>
                                    </div>
                                    <button type="button" class="hover-text-danger">
                                        <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                                    </button>
                                </div>
                                <ul class="to-top-list">
                                    <!-- <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                            href="view-profile.html">
                                            <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>
                                            My Profile
                                        </a>
                                    </li> -->
                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3"
                                            href="<?= base_url('admin/logout') ?>">
                                            <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon> Log
                                            Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- Profile dropdown end -->
                    </div>
                </div>
            </div>
        </div>