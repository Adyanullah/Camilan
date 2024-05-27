<?php
require_once('Database/base.php');
require_once('Database/database.php');
?>
<?php
$perubahan = false;
if (isset($_POST['forgotEU'])) {
    $userdata = getDataAll('customer');
    foreach ($userdata as $cst) {
        if ($_POST['forgotEU'] == $cst['EMAIL'] || $_POST['forgotEU'] == $cst['USERNAME']) {
            $perubahan = true;
            // var_dump($userdata);
            // die;
            $user_id = $cst['ID_CUSTOMER'];
        }
    }
}
?>


<?php
include("templates/navbar.php")
?>
<?php if ($perubahan == true) : ?>
    <style>
        .password-show {
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .password-close {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
<?php else : ?>
    <style>
        .password-show {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .password-close {
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
<?php endif; ?>


<section style="min-height: 80vh; min-width:80vw;" class="d-flex justify-content-center align-items-center">
    <div class="pb-5 mb-5 pt-1 bg-white border rounded-3 password-show" style="width: 50%;" id="PassConfirm1">
        <span class="my-5">Lupa Password</span>
        <form action="" method="post">
            <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                    <label for="email" class="form-label">Email / Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="forgotEU" placeholder="Masukkan Email / Username" required>
                </div>
                <div class="col-12">
                    <div class="d-grid">
                        <button class="btn bsb-btn-xl btn-primary" type="submit">Check</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <hr class="mt-5 mb-4 border-secondary-subtle">
                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                    <a href="login.php" class="link-secondary text-decoration-none">Back To Login</a>
                    <a href="register.php" class="link-secondary text-decoration-none">Create new account?</a>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-5 mb-5 pt-1 bg-white border rounded-3 password-close" style="width: 50%;" id="PassConfirm2">
        <span class="my-5">Lupa Password</span>
        <form action="<?= BASEURL . 'autentikasi/updatepass.php' ?>" method="post">
            <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                    <label for="password" class="form-label">Masukkan Password Baru<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password" id="password" value="" required>
                    <input type="hidden" name="id" value="<?= $user_id; ?>">
                </div>
                <div class="col-12">
                    <div class="d-grid">
                        <input class="btn bsb-btn-xl btn-primary" type="submit" value="Submit">
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <hr class="mt-5 mb-4 border-secondary-subtle">
                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                    <a href="login.php" class="link-secondary text-decoration-none">Back To Login</a>
                    <a href="register.php" class="link-secondary text-decoration-none">Create new account?</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("templates/footer.php") ?>
<?php include "../templates/footer.php" ?>