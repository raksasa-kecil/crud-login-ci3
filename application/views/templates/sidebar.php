<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">crud-ci3</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - No Dropdown -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Dropdown -->
    <li class="nav-item">
        <a class="nav-link pb-2 collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php if ($this->session->userdata('level') == 'Admin') : ?>
                    <a class="collapse-item" href="<?= base_url('user'); ?>">User</a>
                <?php endif; ?>
                <a class="collapse-item" href="<?= base_url('genre') ?>">Genre</a>
                <a class="collapse-item" href="<?= base_url('komik') ?>">Komik</a>
                <a class="collapse-item" href="<?= base_url('file') ?>">File</a>
                <a class="collapse-item" href="<?= base_url('crew') ?>">Crew</a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-3">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->