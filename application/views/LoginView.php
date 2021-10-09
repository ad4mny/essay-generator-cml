<div class="container">
    <div class="row position-absolute top-50 start-50 translate-middle w-100">
        <div class="col text-center text-white">
            <?php
            if (isset($_SESSION['uid'])) {
                echo '<h1 class="font-weight-light">Welcome, ' . $_SESSION["user"] . '.</h1>';
                echo '<p class="lead text-white">Browse meal to feed your tummy now.</p>';
                echo '<a href="' . base_url() .'profile/update" class="btn btn-outline-light">Update info</a>';
            } else {
                echo '<h1 class="font-weight-light">A great way to fill your appetite </h1>';
                echo '<p class="lead"><a href="' . base_url() .'catalog" class="btn btn-outline-light">Order now.</a></p>';
            }
            ?>
        </div>
    </div>
</div>