<div class="container-fluid p-5" id="content">
    <div class="row">
        <div class="col-10">
            <h2>Submission</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <p>Essay outline view.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-10 m-1 bg-white rounded-3 border p-3 position-relative">
            <?php if (isset($outlines) && is_array($outlines) && $outlines !== false && !empty($outlines)) : ?>
                <p>
                    <?php
                    $first_word = true;
                    $previous_word = '';
                    foreach ($outlines['intro'] as $outline) :
                        if ($first_word) {
                            echo $outline['word'];
                            $first_word = false;
                        } else {
                            if ($previous_word === '.')
                                echo ' ' . $outline['word'];
                            else if ($outline['word'] === '.' ||  $outline['word'] === ',')
                                echo strtolower($outline['word']);
                            else
                                echo ' ' . strtolower($outline['word']);
                        }
                        $previous_word = $outline['word'];
                    endforeach;
                    ?>
                </p>
                <p>
                    <?php
                    $first_word = true;
                    $previous_word = '';
                    foreach ($outlines['body'] as $outline) :
                        if ($first_word) {
                            echo $outline['word'];
                            $first_word = false;
                        } else {
                            if ($previous_word === '.')
                                echo ' ' . $outline['word'];
                            else if ($outline['word'] === '.' ||  $outline['word'] === ',')
                                echo strtolower($outline['word']);
                            else
                                echo ' ' . strtolower($outline['word']);
                        }
                        $previous_word = $outline['word'];
                    endforeach;
                    ?>
                </p>
            <?php else : ?>
                <div class="row">
                    <div class="col m-1 bg-white rounded-3 border p-3">
                        <p>No outline found.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>