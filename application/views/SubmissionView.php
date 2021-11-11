<div class="container-fluid p-5" id="content">
    <div class="row">
        <div class="col-10 border-bottom mb-3">
            <h1 class="display-4">Submission</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <h3>Vocabulary List</h3>
        </div>
    </div>
    <?php if (isset($submissions) && is_array($submissions) && $submissions !== false) {
        foreach ($submissions as $data) { ?>
            <div class="row">
                <div class="col-10 m-1 bg-white rounded-3 border p-3 position-relative">
                    <p class="fw-bold"><?php echo $data['name']; ?></p>
                    <?php
                    $title = explode(',', $data['title']);
                    $id = explode(',', $data['id']);
                    foreach ($title as $key => $value) {
                    ?>
                        <p class="text-capitalize ms-3">
                            <a href="<?php echo base_url() . 'submission/view/' . $id[$key]; ?>">
                                <?php echo $value; ?>
                            </a>
                        </p>

                    <?php } ?>
                </div>
            </div>
        <?php }
    } else { ?>
        <div class="row">
            <div class="col m-1 bg-white rounded-3 border p-3">
                <p>No vocabularies found.</p>
            </div>
        </div>
    <?php }
    ?>
</div>