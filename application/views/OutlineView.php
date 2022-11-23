<div class="container-fluid p-5" id="content">
    <div class="row">
        <div class="col-10 border-bottom mb-3">
            <h1 class="display-4">Submission</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <h3>Essay Outline</h3>
        </div>
    </div>
    <?php if (isset($outlines) && is_array($outlines) && $outlines !== false) : ?>
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
                <p>No vocabularies found.</p>
            </div>
        </div>
    <?php endif; ?>
</div>