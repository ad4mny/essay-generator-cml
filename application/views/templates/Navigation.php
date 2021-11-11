<!-- Alert -->
<div id="alert" class="w-50 position-absolute" style="z-index: 1; top:10%; left: 25%;">
</div>

<!-- Sidebar Menu -->
<nav id="sidebar">
    <div class="sidebar-header d-flex flex-row">
        <h3 class="ml-3 mb-0">EGCML</h3>
    </div>
    <ul class="list-unstyled components">
        <li class="<?php if ($this->uri->segment(1) == 'dashboard') echo 'active'; ?>">
            <a href="<?php echo base_url(); ?>dashboard"><i class="fas fa-columns fa-fw fa-sm m-1"></i> Dashboard</a>
        </li>
        <li class="<?php if ($this->uri->segment(1) == 'vocabulary') echo 'active'; ?>">
            <a href="<?php echo base_url(); ?>vocabulary"><i class="fas fa-underline fa-fw fa-sm m-1"></i> Vocabulary</a>
        </li>
        <li class="<?php if ($this->uri->segment(1) == 'submission') echo 'active'; ?>">
            <a href="<?php echo base_url(); ?>submission"><i class="fas fa-align-left fa-fw fa-sm m-1"></i> Submissions</a>
        </li>
        <li class="<?php if ($this->uri->segment(1) == 'logout') echo 'active'; ?>">
            <a href="<?php echo base_url(); ?>logout"><i class="fas fa-sign-out-alt fa-fw fa-sm m-1"></i> Logout</a>
        </li>
    </ul>
</nav>