<?php
require_once('../Database/base.php');
require_once('../Database/database.php');
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
</style>

<?php
include("../templates/navbar.php")
?>

<section style="background-color: white; min-height:100vh; min-width:100vw; margin:0;">
    <div style=" margin: 2vh 0 0 0;">
        <img class="img-fluid rounded-circle mx-auto d-block" style="width: 200px; height: 200px;" src="https://via.placeholder.com/200x200" />
        <p class="text-center profilename">Camilan Account</p>
        <p class="text-center profileguide">You can manage your account and track your order here</p>
    </div>
    <div class="d-flex flex-column justify-content-center" style="justify-content: center; align-items:center; padding:10px">
        <div style="width: 70vw; height: 0px; border-top: 0.50px black solid"></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-3 widgetcontainer-list" style="padding-left:8vw; min-height:100vh; display:flex; flex-direction:column;">
            <button id="acc_info">
                <div class="widgetList">
                    <img style="width: 50px; height: 50px" src="<?= BASEURL ?>./gambar/profile/Info.png" />
                    <span style="color: black; font-size: 14px; font-family: Inter; font-weight: 700; word-wrap: break-word">Account Info</span>
                </div>
            </button>
            <button id="wish_info">
                <div class="widgetList">
                    <img style="width: 50px; height: 50px" src="<?= BASEURL ?>./gambar/profile/Wishlist.png" />
                    <span style="color: black; font-size: 14px; font-family: Inter; font-weight: 400; word-wrap: break-word">Wishlist</span>
                </div>
            </button>
            <button id="order_info">
                <div class="widgetList">
                    <img style="width: 50px; height: 50px" src="<?= BASEURL ?>./gambar/profile/MyOrder.png" />
                    <span style="color: black; font-size: 14px; font-family: Inter; font-weight: 400; word-wrap: break-word">My Order</span>
                </div>
            </button>
            <button id="address_info">
                <div class="widgetList">
                    <img style="width: 50px; height: 50px" src="<?= BASEURL ?>./gambar/profile/Address.png" />
                    <span style="color: black; font-size: 14px; font-family: Inter; font-weight: 400; word-wrap: break-word">Address</span>
                </div>
            </button>
            <button id="logout">
                <div class="widgetList">
                    <img style="width: 50px; height: 50px" src="<?= BASEURL ?>./gambar/profile/Logout.png" />
                    <span style="color: black; font-size: 14px; font-family: Inter; font-weight: 400; word-wrap: break-word">Logout</span>
                </div>
            </button>
        </div>
        <div class="col-7">

        </div>
    </div>
    <div class="jarak" style="min-height:100px; background-color:white; width:100vw; margin:0;"></div>
</section>


<?php include "../templates/footer.php" ?>