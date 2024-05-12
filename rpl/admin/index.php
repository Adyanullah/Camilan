<?php
require_once('../Database/base.php');
require_once('../Database/database.php');
?>

<style>
    form div input {
        margin-bottom: 2vh;
    }
</style>

<?php
include("../templates/navbar.php")
?>

<div class="container" style="padding-top: 10vh; padding-bottom: 10vh;">
    <div class="list-group" style="background-color: transparent;">
        <a href="listallproduk.php" class="list-group-item list-group-item-action list-group-item-dark">Management Produk</a>
        <a href="tambahproduk.php" class="list-group-item list-group-item-action list-group-item-dark">Tambah Produk</a>

    </div>
</div>


<?php include("../templates/footer.php") ?>