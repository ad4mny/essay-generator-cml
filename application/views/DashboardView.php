<div class="container-fluid p-5" id="content">
    <div class="row">
        <div class="col-10">
            <h2>Group/Team</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <p>All created group list.</p>
        </div>
    </div>
    <?php if (isset($dashboards) && is_array($dashboards) && $dashboards !== false) {
        foreach ($dashboards as $data) { ?>
            <div class="row">
                <div class="col-10 m-1 bg-white rounded-3 border p-3 position-relative">
                    <p class="fw-bold mb-0"><?php echo $data['group']; ?></p>
                    <hr>
                    <?php
                    $numbering = 0;
                    $student = explode(',', $data['student']);
                    foreach ($student as $person) {
                        echo '<p class="text-capitalize ms-3 mb-0">' . ++$numbering . '. ' . $person . '</p>';
                    }
                    ?>
                    <div class="position-absolute end-0 top-0 m-3">
                        <a href="<?php echo base_url() . 'dashboard/delete/' . $data['id']; ?>" onclick="return confirm('Are sure you want to delete this group?')" class="link-danger">
                            <small class="iconsax"><i class="isax isax-trash mr-1"></i> Delete</small>
                        </a>
                    </div>
                </div>
            </div>
        <?php }
    } else { ?>
        <div class="row">
            <div class="col m-1 bg-white rounded-3 border p-3">
                <p>No group found.</p>
            </div>
        </div>
    <?php }
    ?>
</div>