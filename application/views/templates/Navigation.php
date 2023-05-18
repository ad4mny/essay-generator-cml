<!-- Alert -->
<div id="alert" class="w-50 position-absolute" style="z-index: 1; top:10%; left: 25%;">
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

<div class="">
    <!-- Sidebar Menu -->
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-white vh-100 shadow" style="width: 280px;">
        <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <img src="<?php echo base_url(); ?>assets/logo.jpeg" width="245px">
        </div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard" class="nav-link <?php if ($this->uri->segment(1) == 'dashboard') echo 'active'; ?>">
                    <i class="isax isax-element-equal mr-2"></i> Group/Team
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>vocabulary" class="nav-link <?php if ($this->uri->segment(1) == 'vocabulary') echo 'active'; ?>">
                    <i class="isax isax-book mr-2"></i> Vocabulary
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>submission" class="nav-link <?php if ($this->uri->segment(1) == 'submission') echo 'active'; ?>">
                    <i class="isax isax-direct-inbox mr-2"></i> Submission
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-decoration-none">
                <a class="dropdown-item iconsax text-danger" href="<?php echo base_url(); ?>logout">
                    <i class="isax isax-logout mr-2"></i> Logout
                </a>
            </a>
        </div>
    </div>
</div>