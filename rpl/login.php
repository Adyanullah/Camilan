<?php
require_once('Database/base.php');
require_once('Database/database.php');
?>


<?php
include("templates/navbar.php")
?>

<!-- Login 4 - Bootstrap Brain Component -->
<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">
                <div class="col-12 col-md-6">
                    <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="gambar/makaroni.jpg" alt="W Logo">
                </div>
                <div class="col-12 col-md-6">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-5">
                                    <h3>Log in</h3>
                                </div>
                            </div>
                        </div>
                        <form action="<?= BASEURL . 'autentikasi/loginauth.php' ?>" method="post">
                            <div class="row gy-3 gy-md-4 overflow-hidden">
                                <!-- <div class="col-12">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                </div>                                 -->
                                <div class="col-12">
                                    <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="username" placeholder="your username" required>
                                    <small class="text-danger" style="font-size: 0.7em;">
                                        <?php
                                        $error = (isset($_SESSION['error']['username'])) ? $_SESSION['error']['username'] : '';
                                        echo $error;
                                        ?>
                                    </small>
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" value="" required>
                                    <small class="text-danger" style="font-size: 0.7em;">
                                        <?php
                                        $error = (isset($_SESSION['error']['password'])) ? $_SESSION['error']['password'] : '';
                                        echo $error;
                                        ?>
                                    </small>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                                        <label class="form-check-label text-secondary" for="remember_me">
                                            Keep me logged in
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn bsb-btn-xl btn-primary" type="submit">Log in now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <hr class="mt-5 mb-4 border-secondary-subtle">
                                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                    <a href="register.php" class="link-secondary text-decoration-none">Create new account</a>
                                    <a href="forgotpassword.php" class="link-secondary text-decoration-none">Forgot password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("templates/footer.php") ?>