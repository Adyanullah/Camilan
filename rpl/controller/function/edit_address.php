<?php


require_once('../../Database/base.php');
require_once('../../Database/database.php');

require_once "../../controller/function/ongkir.php";
$data = new rajaongkir();

$kota = $data->get_city();
$kota = json_decode($kota, true);
$kota = $kota['rajaongkir']['results'];

$data_2 = new rajaongkir();

$provinsi = $data_2->get_prov();
$provinsi = json_decode($provinsi, true);
$provinsi = $provinsi['rajaongkir']['results'];

$nameProv = "";
$nameCity = "";
foreach ($provinsi as $p) {
    if ($p['province_id'] == $_POST['provinsi']) {
        $nameProv = $p['province'];
    }
}
foreach ($kota as $cc) {
    if ($cc['city_id'] == $_POST['kabupaten']) {
        $nameCity = $cc['city_name'];
    }
}

if (isset($_SESSION['user'])) {
    UpdateAlamat($_POST, $nameCity, $nameProv, $_SESSION['user']['ID_CUSTOMER']);
    $getDataCustomer = getDataAllWhere('customer', 'ID_CUSTOMER', $_SESSION['user']['ID_CUSTOMER']);
    $_SESSION['user'] = $getDataCustomer[0];
    $_SESSION['status'] = "Sukses Edit Alamat !!!";
    header("Location: " . BASEURL . "profile");
    exit();
} else {
    header("Location: " . BASEURL . "login.php");
}
$_SESSION['status'] = "GAGAL Edit Alamat !!!";
header("Location: " . BASEURL . "profile");
