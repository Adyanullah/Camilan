<?php
require_once("../../Database/base.php");
require_once("../../Database/database.php");

$user = $_SESSION['user']['ID_CUSTOMER'];
$total = intval($_POST['jumlah_keseluruhan_harga']);
$ongkir = intval($_POST['harga_ongkir']);
$str_array_keranjang = $_POST['array_keranjang'];

if (empty($user) or empty($total) or empty($ongkir) or empty($str_array_keranjang)) {
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
}

Pesan($user, $total, $str_array_keranjang);
