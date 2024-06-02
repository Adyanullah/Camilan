<div id="page6" class="page">
    <form action="<?= BASEURL . 'controller/function/edit_akun.php'; ?>" method="post">
        <div class="profile-container-title">
            Account info ( Edit )
        </div>
        <div class="profile-container-card">
            <div class="d-flex justify-content-between" style="margin: 1.6vh 0 1.6vh 0">
                <input type="hidden" name="edit_user" value="<?= $_SESSION['user']['ID_CUSTOMER']; ?>">
                <a href="<?= BASEURL . 'profile'; ?>" class="profile-underline-link">Cancel<br /></a>
                <input type="submit" class="profile-underline-link" value="Submit">
            </div>
            <div class="profile-header-card-line"></div>
            <div class="accountinfo-txt">
                <span class="accountinfo-txt-key">Username</span>
                <input name="username" placeholder="Masukkan Username Baru" class="accountinfo-txt-value-edit-mode pt-1" required>
                <small class="text-danger" style="font-size: 0.7em;">
                    <?php
                    $error = (isset($_SESSION['error']['username'])) ? $_SESSION['error']['username'] : '';
                    echo $error;
                    ?>
                </small>
            </div>
            <div class="accountinfo-txt">
                <span class="accountinfo-txt-key">Nama Lengkap</span>
                <input name="fullname" placeholder="Masukkan Nama Lengkap Baru" class="accountinfo-txt-value-edit-mode pt-1" required>
            </div>
            <div class="accountinfo-txt">
                <span class="accountinfo-txt-key">Email</span>
                <input name="email" placeholder="Masukkan Email Baru" class="accountinfo-txt-value-edit-mode pt-1" required>
                <small class="text-danger" style="font-size: 0.7em;">
                    <?php
                    $error = (isset($_SESSION['error']['email'])) ? $_SESSION['error']['email'] : '';
                    echo $error;
                    ?>
                </small>
            </div>
            <div class="accountinfo-txt">
                <span class="accountinfo-txt-key">Phone Number</span>
                <input name="notelp" placeholder="Masukkan Nomor Baru" class="accountinfo-txt-value-edit-mode pt-1" required>
                <small class="text-danger" style="font-size: 0.7em;">
                    <?php
                    $error = (isset($_SESSION['error']['notelp'])) ? $_SESSION['error']['notelp'] : '';
                    echo $error;
                    ?>
                </small>
            </div>
        </div>
        <div class="d-flex justify-content-between profile-container-card-bottom">
            <div class="profile-nonunderline-sidelink-smaller">
                Password
            </div>
            <a href="<?= BASEURL . 'forgotpassword.php' ?>" class="profile-underline-link-smaller">Change Password</a>
        </div>
    </form>
</div>