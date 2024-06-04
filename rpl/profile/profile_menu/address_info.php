<div id="page4" class="page">
    <form action="" method="post">
        <div style="margin:3.9vh 0 3.4vh 0; color: black; font-size: 18px; font-family: Inter; font-weight: 700; word-wrap: break-word">Saved Addres</div>
        <div style="width: 74%; min-height: 140px; background: rgba(217, 217, 217, 0); border-radius: 10px; border: 0.50px #999595 solid; padding: 0 0.7vw 0 0.7vw; margin-bottom: 2.1vh;">
            <div class="d-flex justify-content-between" style="margin-bottom: 0.9vh;">
                <div class="d-flex">
                    <div style="color: #6B6B6B; font-size: 14px; font-family: Inter; font-weight: 400;">Home</div>
                    <div style="color: #6B6B6B; font-size: 9px; font-family: Inter; font-weight: 400; padding-top:3px; margin: 0 1.35vw 0 1.35vw">●</div>
                    <div style="color: #6B6B6B; font-size: 14px; font-family: Inter; font-weight: 400;">Default</div>
                </div>
                <input type="hidden" name="edit_alamat_akun" value="<?= $_SESSION['user']['ID_CUSTOMER']; ?>">
                <input type="submit" class="profile-underline-link" value="Edit">
            </div>
            <div style="width: 155px">
                <span style="color: #6B6B6B; font-size: 14px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?= $_SESSION['user']['NAMA_CUSTOMER']; ?> <br> <?= $_SESSION['user']['ALAMAT']; ?> <?= $_SESSION['user']['KOTA']; ?> <?= $_SESSION['user']['PROVINSI']; ?> <?= $_SESSION['user']['NOMOR_TELPON_CUSTOMER']; ?> </span>
            </div>
        </div>
    </form>
</div>