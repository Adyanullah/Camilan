<div id="page1" class="page show">
  <div style="
      color: black;
      font-size: 18px;
      font-family: Inter;
      font-weight: 700;
      word-wrap: break-word;
      margin:3.9vh 0 0 0;
    ">
    Account info
  </div>
  <div style="
      width: 650px;
      min-height: 300px;
      background: rgba(0, 0, 0, 0);
      border-radius: 20px;
      border: 2px black solid;
      margin: 4vh 0 0 0;
      padding: 0 1.2vw 0 1.2vw;
    ">
    <div class="d-flex justify-content-between" style="margin: 1.6vh 0 1.6vh 0">
      <span style="
          color: black;
          font-size: 14px;
          font-family: Inter;
          font-weight: 400;
          word-wrap: break-word;
        ">My details<br /></span>
      <a href="#" style="
          color: black;
          font-size: 14px;
          font-family: Inter;
          font-weight: 400;
          text-decoration: underline;
          word-wrap: break-word;
        ">Edit</a>
    </div>
    <div style="
        width: 100%;
        height: 0px;
        border-top: 0.5px black solid;
        margin: 0.3vh 0 2vh 0;
      "></div>
    <div class="accountinfo-txt">
      <span class="accountinfo-txt-key">Name</span>
      <span class="accountinfo-txt-value"><?= $_SESSION['user']['NAMA_CUSTOMER']; ?></span>
    </div>
    <div class="accountinfo-txt">
      <span class="accountinfo-txt-key">Email</span>
      <span class="accountinfo-txt-value"><?= $_SESSION['user']['EMAIL']; ?></span>
    </div>
    <div class="accountinfo-txt">
      <span class="accountinfo-txt-key">Birthday</span>
      <span class="accountinfo-txt-value">01/01/2000</span>
    </div>
    <div class="accountinfo-txt">
      <span class="accountinfo-txt-key">Phone Number</span>
      <span class="accountinfo-txt-value"><?= $_SESSION['user']['NOMOR_TELPON_CUSTOMER']; ?></span>
    </div>
  </div>
  <div class="d-flex justify-content-between" style="
      align-items: center;
      width: 650px;
      min-height: 50px;
      background: rgba(0, 0, 0, 0);
      border-radius: 20px;
      border: 2px black solid;
      padding: 0 2.5vw 0 2.5vw;
      margin-top: 0.7vh;
    ">
    <div style="
        color: black;
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        word-wrap: break-word;
      ">
      Password
    </div>
    <a href="<?= BASEURL . 'forgotpassword.php' ?>" style="
        color: black;
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        text-decoration: underline;
        word-wrap: break-word;
      ">Change Password</a>
  </div>
</div>