<div class="container-fluid p-5" id="content">
    <div class="row">
        <div class="col-10">
            <h2>Submission</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <p>All student submission list.</p>
        </div>
    </div>
    <?php if (isset($submissions) && is_array($submissions) && $submissions !== false) {
        foreach ($submissions as $data) { ?>
            <div class="row">
                <div class="col-10 m-1 bg-white rounded-3 border p-3 position-relative">
                    <p class="fw-bold mb-0"><?php echo $data['name']; ?></p>
                    <hr>
                    <div class="d-flex">
                        <?php
                        $title = explode(',', $data['title']);
                        $id = explode(',', $data['id']);
                        foreach ($title as $key => $value) {
                        ?>
                            <a href="<?php echo base_url() . 'submission/view/' . $id[$key]; ?>" type="button" class="btn btn-outline-primary btn-sm m-1">
                                <?php echo $value; ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php }
    } else { ?>
        <div class="row">
            <div class="col m-1 bg-white rounded-3 border p-3">
                <p>No submissions found.</p>
            </div>
        </div>
    <?php }
    ?>
</div>