<div class="container-fluid p-5" id="content">
    <div class="row">
        <div class="col-10 border-bottom mb-3">
            <h1 class="display-4">Vocabulary</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <h3>Vocabulary List</h3>
        </div>
    </div>
    <form class="row g-2 pb-2" method="post" action="<?php echo base_url(); ?>vocabulary/submit">
        <div class="col-auto">
            <input type="text" class="form-control" name="word" placeholder="Add new word">
        </div>
        <div class="col-auto">
            <select name="paragraph" class="form-select">
                <option value="1">Introduction</option>
                <option value="2">Body</option>
            </select>
        </div>
        <div class="col-auto">
            <select name="type" class="form-select">
                <option value="1">Email 1</option>
                <option value="2">Email 2</option>
                <option value="3">Email 3</option>
                <option value="4">Email 4</option>
                <option value="5">Email 5</option>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary" name="submit">Add</button>
        </div>
    </form>
    <div class="row row-cols-2 g-2">
        <?php if (isset($vocabularies) && is_array($vocabularies) && $vocabularies !== false) {
            foreach ($vocabularies as $data) { ?>
                <div class="col p-3">
                    <p class="fw-bold">
                        Email <?php echo $data['type'][0]; ?>
                        <?php if ($data['paragraph'][0] == 1) : ?>
                            <small class="text-muted">(Introduction)</small>
                        <?php else : ?>
                            <small class="text-muted">(Body)</small>
                        <?php endif; ?>
                    </p>
                    <div class="d-flex">
                        <?php
                        $word = explode(',', $data['word']);
                        // $paragraph = explode(',', $data['paragraph']);
                        foreach ($word as $key => $value) :
                        ?>
                            <div class="text-capitalize border rounded-3 px-3 py-1 m-1"><?= $value; ?></div>
                        <?php endforeach;  ?>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="col bg-white rounded-3 border p-3">
                <p>No vocabularies found.</p>
            </div>
        <?php }
        ?>
    </div>

</div>