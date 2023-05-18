<div class="login-bg">
    <div class="blur">
        <div class="d-flex vh-100 align-items-center justify-content-center">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="row row-cols-1 row-cols-lg-2 rounded-5 bg-white shadow p-lg-5 p-3 m-2 m-lg-0">
                        <div class="col d-flex align-items-center justify-content-center p-5 p-md-0">
                            <img src="<?php echo base_url(); ?>assets/logo.jpeg" class="img-fluid">
                        </div>
                        <div class="col">
                            <form class="row g-2" method="post" action="<?php echo base_url(); ?>login">
                                <div class="col-12 text-muted">
                                    Hello,
                                    <h4 class="greetings">Good Day!</h4>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="username" placeholder="Your username" required>
                                </div>
                                <div class="col-12">
                                    <input type="password" class="form-control" name="password" placeholder="Your password" required>
                                </div>
                                <div class="col-auto">
                                    <?php
                                    if ($this->session->tempdata('notice') != NULL) {
                                        echo '<small class="text-success">';
                                        echo '<i class="isax isax-tick"></i> ' . $this->session->tempdata('notice');
                                        echo '</small>';
                                    } else if ($this->session->tempdata('error') != NULL) {
                                        echo '<small class="text-danger">';
                                        echo '<i class="isax isax-danger"></i> ' . $this->session->tempdata('error');
                                        echo '</small>';
                                    }
                                    ?>
                                </div>
                                <hr>
                                <div class="col-auto">
                                    <button type="submit" class="form-control btn btn-primary" name="submit">
                                        <i class="fas fa-sign-in-alt fa-fw fa-sm"></i>
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>