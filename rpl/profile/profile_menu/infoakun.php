<div id="page1" class="page show">
  <div class="profile-container-title">
    Account info
  </div>
  <div class="profile-container-card">
    <form action="" method="post" class="d-flex justify-content-between" style="margin: 1.6vh 0 1.6vh 0">
      <input type="hidden" name="edit_user" value="<?= $_SESSION['user']['ID_CUSTOMER']; ?>">
      <span class="profile-nonunderline-sidelink">My details<br /></span>
      <input type="submit" class="profile-underline-link" value="Edit">
    </form>
    <div class="profile-header-card-line"></div>
    <div class="accountinfo-txt">
      <span class="accountinfo-txt-key">Name</span>
      <span class="accountinfo-txt-value"><?= $_SESSION['user']['NAMA_CUSTOMER']; ?></span>
    </div>
    <div class="accountinfo-txt">
      <span class="accountinfo-txt-key">Email</span>
      <span class="accountinfo-txt-value"><?= $_SESSION['user']['EMAIL']; ?></span>
    </div>
    <!-- <div class="accountinfo-txt">
      <span class="accountinfo-txt-key">Birthday</span>
      <span class="accountinfo-txt-value">01/01/2000</span>
    </div> -->
    <div class="accountinfo-txt">
      <span class="accountinfo-txt-key">Phone Number</span>
      <span class="accountinfo-txt-value"><?= $_SESSION['user']['NOMOR_TELPON_CUSTOMER']; ?></span>
    </div>
  </div>
  <div class="d-flex justify-content-between profile-container-card-bottom">
    <div class="profile-nonunderline-sidelink-smaller">
      Password
    </div>
    <a href="<?= BASEURL . 'forgotpassword.php' ?>" class="profile-underline-link-smaller">Change Password</a>
  </div>
</div>