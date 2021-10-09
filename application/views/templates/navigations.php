<!-- Navigations -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top d-none d-lg-block">
    <div class="container-fluid">
        <a class="navbar-brand text-success" href="#">eHungry</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(1) == '') echo 'active border-bottom border-success'; ?>" href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(1) == 'catalog') echo 'active border-bottom border-success'; ?>" href="<?php echo base_url(); ?>catalog">Catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(1) == 'table') echo 'active border-bottom border-success'; ?>" href="<?php echo base_url(); ?>table">Book A Table</a>
                </li>
            </ul>
            <div class="d-flex">
                <?php if (!isset($_SESSION['order'])) { ?>
                    <a href="<?php echo base_url(); ?>checkout" class="btn <?php if ($this->uri->segment(1) == 'checkout') echo 'text-success '; ?>">
                        <i class="fas fa-shopping-basket"></i>
                    </a>
                <?php } else { ?>
                    <a href="<?php echo base_url(); ?>checkout" class="btn position-relative <?php if ($this->uri->segment(1) == 'checkout') echo 'text-success' ?>">
                        <i class="fas fa-shopping-basket"></i>
                        <span class="position-absolute badge rounded-pill bg-danger end-0">
                            <small> <?php echo sizeof($_SESSION['order']); ?></small>
                        </span>
                    </a>
                <?php }
                if (isset($_SESSION['uid'])) {  ?>
                    <div class="dropdown">
                        <a href="#" class="btn position-relative <?php if ($this->uri->segment(1) == 'profile') echo 'text-success' ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-default" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>profile">Profile</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>logout">Log Out</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#modal_login">
                        <i class="fas fa-sign-in-alt"></i>
                    </button>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>
<!-- Mobile Toolbar -->
<div class="bg-white d-block d-lg-none d-inline-flex w-100 border-top shadow-sm ">
    <div class="p-2 flex-fill">
        <p class="mb-0 text-success fw-bold text-center">eHungry</p>
    </div>
</div>
<!-- Mobile Appbar -->
<div class="bg-white fixed-bottom d-block d-lg-none d-inline-flex w-100 border-top shadow-sm ">
    <div class="p-2 flex-fill">
        <a class="btn <?php if ($this->uri->segment(1) == '') echo 'text-success'; ?>" href="<?php echo base_url(); ?>">
            <i class="fas fa-home fa-fw fa-lg"></i>
        </a>
    </div>
    <div class="p-2 flex-fill">
        <a class="btn <?php if ($this->uri->segment(1) == 'catalog') echo 'text-success '; ?>" href="<?php echo base_url(); ?>catalog">
            <i class="fas fa-utensils fa-fw fa-lg"></i>
        </a>
    </div>
    <div class="p-2 flex-fill">
        <a class="btn <?php if ($this->uri->segment(1) == 'table') echo 'text-success '; ?>" href="<?php echo base_url(); ?>table">
            <i class="fas fa-table fa-fw fa-lg"></i>
        </a>
    </div>
    <div class="p-2 flex-fill">
        <?php if (!isset($_SESSION['order'])) { ?>
            <a href="<?php echo base_url(); ?>checkout" class="btn <?php if ($this->uri->segment(1) == 'checkout') echo 'text-success'; ?>">
                <i class="fas fa-shopping-basket fa-fw fa-lg"></i>
            </a>
        <?php } else { ?>
            <a href="<?php echo base_url(); ?>checkout" class="btn position-relative <?php if ($this->uri->segment(1) == 'checkout') echo 'text-success' ?>">
                <i class="fas fa-shopping-basket fa-fw fa-lg"></i>
                <span class="position-absolute badge rounded-pill bg-danger end-0">
                    <small> <?php echo sizeof($_SESSION['order']); ?></small>
                </span>
            </a>
        <?php }  ?>
    </div>
    <div class="p-2 flex-fill">
        <?php if (isset($_SESSION['uid'])) { ?>
            <a href="<?php echo base_url(); ?>profile" class="btn position-relative <?php if ($this->uri->segment(1) == 'profile') echo 'text-success' ?>">
                <i class="fas fa-user fa-fw fa-lg"></i>
            </a>
        <?php } else { ?>
            <button class="btn" data-bs-toggle="modal" data-bs-target="#modal_login">
                <i class="fas fa-user fa-fw fa-lg"></i>
            </button>
        <?php } ?>
    </div>
</div>
<!-- Alerts -->
<div id="alert" class="w-75 position-absolute start-50 translate-middle mt-5" style="z-index: 1; top: 10%;">
    <?php
    if ($this->session->tempdata('notice') != NULL) {
        echo '<div class="alert alert-success border-0 shadow alert-dismissible fade show" role="alert">';
        echo '<i class="fas fa-info-circle fa-fw"></i> ' . $this->session->tempdata('notice');
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }
    if ($this->session->tempdata('error') != NULL) {
        echo '<div class="alert alert-danger border-0 shadow alert-dismissible fade show" role="alert">';
        echo '<i class="fas fa-exclamation-circle fa-fw"></i> ' . $this->session->tempdata('error');
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }
    ?>
</div>