<div class="container-fluid p-5" id="content">
    <div class="row">
        <div class="col-10 border-bottom mb-3">
            <h1 class="display-4">Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <h3>All Group List</h3>
        </div>
    </div>
    <?php if (isset($dashboards) && is_array($dashboards) && $dashboards !== false) {
        foreach ($dashboards as $data) { ?>
            <div class="row">
                <div class="col-10 m-1 bg-white rounded-3 border p-3">
                    <p class="fw-bold"><?php echo $data['group']; ?></p>
                    <?php
                    $student = explode(',', $data['student']);
                    foreach ($student as $person) {
                        echo '<p class="text-capitalize ms-3">' . $person . '</p>';
                    }
                    ?>
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