<?php
require_once("../../Database/base.php");
require_once("../../Database/database.php");

if ($_SESSION['user']) {
    $user = $_SESSION['user']['ID_CUSTOMER'];
    $total = intval($_POST['jumlah_keseluruhan_harga']);
    $ongkir = intval($_POST['harga_ongkir']);
    $str_array_keranjang = $_POST['array_keranjang'];
    $bankname = $_POST['namabank'];
    $rekening = $_POST['cardnumber'];

    if (empty($user) or empty($total) or empty($ongkir) or empty($str_array_keranjang)) {
        $previousPage = $_SERVER['HTTP_REFERER'];
        header("Location: $previousPage");
    }

    Pesan($user, $total, $str_array_keranjang, $bankname, $rekening);
    $_SESSION['status'] = "Pesanan Sedang Di Proses";
    header('Location: ' . BASEURL . 'menu.php');
} else {
    header('Location: ../../login.php');
}
