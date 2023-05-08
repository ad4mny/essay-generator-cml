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
                <option value="3">Conclusion</option>
            </select>
        </div>
        <div class="col-auto">
            <select name="type" class="form-select">
                <option value="1">1: People & Culture</option>
                <option value="2">2: Science & Technology</option>
                <option value="3">3: Health & Environment</option>
                <option value="4">4: Financial & Consumerism</option>
                <option value="5">5: Test 1</option>
                <option value="6">6: People & Culture</option>
                <option value="7">7: Science & Technology</option>
                <option value="8">8: Health & Environment</option>
                <option value="9">9: Financial & Consumerism</option>
                <option value="10">10: Test 2</option>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary" name="submit">Add</button>
        </div>
    </form>
    <div class="row row-cols-3 g-2">
        <?php if (isset($vocabularies) && is_array($vocabularies) && $vocabularies !== false) {
            foreach ($vocabularies as $data) { ?>
                <div class="col p-3">
                    <p class="fw-bold">
                        Email <?php echo $data['type'][0]; ?>
                        <?php if ($data['paragraph'][0] == 1) : ?>
                            <small class="text-muted">(Introduction)</small>
                        <?php elseif ($data['paragraph'][0] == 2) : ?>
                            <small class="text-muted">(Body)</small>
                        <?php else : ?>
                            <small class="text-muted">(Conclusion)</small>
                        <?php endif; ?>
                    </p>
                    <div class="d-flex flex-wrap">
                        <?php
                        $vocabs = array_combine(explode(',', $data['id']), explode(',', $data['word']));
                        foreach ($vocabs as $key => $value) :
                        ?>
                            <div class="btn btn-sm btn-outline-primary m-1">
                                <a href="<?php echo base_url() . 'vocabulary/delete/' . $key; ?>" onclick="return confirm('Are sure you want to delete this vocabulary?')">
                                    <?= $value; ?>
                                    <i class="fas fa-times fa-xs fa-fw"></i>
                                </a>
                            </div>
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