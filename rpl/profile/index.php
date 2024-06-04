<?php
require_once('../Database/base.php');
require_once('../Database/database.php');

if (!isset($_SESSION['user'])) {
    header('location: login.php');
    exit();
}

?>

<style>
    .profilename {
        font-size: 30px;
        font-family: 'Inter';
        margin: 2vh 0 0 0;
    }

    .profileguide {
        color: #6B6B6B;
        text-align: center;
        font-family: Inter;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .widgetList {
        margin: 20px 0 0 0;
    }

    .accountinfo-txt {
        display: flex;
        flex-direction: column;
        margin: 0 0 2.7vh 0;
    }

    .accountinfo-txt-key {
        color: #000;
        font-family: Inter;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .accountinfo-txt-value {
        color: #000;
        font-family: Inter;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .accountinfo-txt-value-edit-mode {
        color: #000;
        font-family: Inter;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        border: none;
        border-bottom: 1px solid black;
    }

    .widgetcontainer-list button {
        text-decoration: none;
        border: none;
        outline: none;
        height: auto;
        width: auto;
        background-color: transparent;
        display: flex;
        justify-content: left;
    }

    .wishlist-container-value {
        display: flex;
    }

    .wishlist-value {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 151px;
        text-align: center;
        margin-right: 3.2vw;
    }

    .page {
        display: none;
    }

    .show {
        display: block;
    }
</style>

<?php
include("../templates/navbar.php")
?>

<section style="background-color: white; min-height:100vh; min-width:100vw; margin:0;">
    <div style=" margin: 2vh 0 0 0;">
        <img class="img-fluid rounded-circle mx-auto d-block" style="width: 200px; height: 200px;" src="<?= BASEURL . 'gambar/profile/' . $_SESSION['user']['FOTO']; ?>" />
        <p class="text-center profilename"><?= $_SESSION['user']['USERNAME']; ?>'s Account</p>
        <p class="text-center profileguide">You can manage your account and track your order here</p>
    </div>
    <div class="d-flex flex-column justify-content-center" style="justify-content: center; align-items:center; padding:10px">
        <div style="width: 70vw; height: 0px; border-top: 0.50px black solid"></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-3 widgetcontainer-list" style="padding-left:8vw; min-height:100vh; display:flex; flex-direction:column;">
            <button id="page1Btn">
                <div class="widgetList">
                    <img style="width: 50px; height: 50px" src="<?= BASEURL ?>./gambar/profile/Info.png" />
                    <span style="color: black; font-size: 14px; font-family: Inter; font-weight: 700; word-wrap: break-word">Account Info</span>
                </div>
            </button>
            <button id="page3Btn">
                <div class="widgetList">
                    <img style="width: 50px; height: 50px" src="<?= BASEURL ?>./gambar/profile/MyOrder.png" />
                    <span style="color: black; font-size: 14px; font-family: Inter; font-weight: 400; word-wrap: break-word">My Order</span>
                </div>
            </button>
            <button id="page4Btn">
                <div class="widgetList">
                    <img style="width: 50px; height: 50px" src="<?= BASEURL ?>./gambar/profile/Address.png" />
                    <span style="color: black; font-size: 14px; font-family: Inter; font-weight: 400; word-wrap: break-word">Address</span>
                </div>
            </button>
            <a href="<?= BASEURL ?>./autentikasi/logout.php" style="text-decoration: none; margin-left:0.65vw;">
                <div class="widgetList">
                    <img style="width: 50px; height: 50px" src="<?= BASEURL ?>./gambar/profile/Logout.png" />
                    <span style="color: black; font-size: 14px; font-family: Inter; font-weight: 400; word-wrap: break-word">Logout</span>
                </div>
            </a>
        </div>
        <div class="col-7">
            <?php include "profile_menu/infoakun.php" ?>
            <?php include "profile_menu/myorder_info.php" ?>
            <?php include "profile_menu/myorder_viewdetails.php" ?>
            <?php include "profile_menu/address_info.php" ?>
            <?php include "profile_menu/edit_akun.php" ?>
            <!-- <?php include "profile_menu/edit_address.php" ?> -->
        </div>
    </div>
    <div class="jarak" style="min-height:100px; background-color:white; width:100vw; margin:0;"></div>
</section>


<?php include "../templates/footer.php" ?>
<script>
    document.getElementById("page1Btn").addEventListener("click", function() {
        togglePage("page1");
    });

    document.getElementById("page3Btn").addEventListener("click", function() {
        togglePage("page3");
    });

    document.getElementById("page4Btn").addEventListener("click", function() {
        togglePage("page4");
    });
    <?php if (isset($_GET['MyOrder_Page'])) : ?>
        togglePage("page3");
    <?php endif; ?>
    <?php if (isset($_POST['order_id'])) : ?>
        togglePage("page5");
    <?php endif; ?>

    <?php if (isset($_POST['edit_user'])) : ?>
        togglePage("page6");
    <?php endif; ?>

    <?php if (isset($_GET['errors'])) : ?>
        togglePage("page6");
    <?php endif; ?>

    function togglePage(pageId) {
        var pages = document.getElementsByClassName("page");
        for (var i = 0; i < pages.length; i++) {
            if (pages[i].id === pageId) {
                pages[i].classList.add("show");
            } else {
                pages[i].classList.remove("show");
            }
        }
    }

    function Pop_Up(pageId) {
        var pages = document.getElementsByClassName("PopUp");
        for (var i = 0; i < pages.length; i++) {
            if (pages[i].classList.contains("show")) {
                pages[i].classList.remove("show");
            } else {
                pages[i].classList.add("show");
            }
        }
    }
</script>