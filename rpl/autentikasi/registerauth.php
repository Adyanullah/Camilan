<?php
require_once('../Database/base.php');
require_once('../Database/database.php');

require_once "../controller/function/ongkir.php";
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



// ____________________________P E N G E C E K A N   F O R M____________________________________

//------ > C E K D A T A B A S E
$data_customer = getDataAll('customer');
$customer_error_count = 0;
foreach ($data_customer as $datac) {
    if ($datac['USERNAME'] == $_POST['username']) {
        $customer_error_count += 1;
        $_SESSION['error']['username'] = "Username Telah Dipakai";
    }
    if ($datac['NOMOR_TELPON_CUSTOMER'] == $_POST['notelp']) {
        $customer_error_count += 1;
        $_SESSION['error']['notelp'] = "Nomor Telepon Telah Dipakai";
    }
    if ($datac['EMAIL'] == $_POST['email']) {
        $customer_error_count += 1;
        $_SESSION['error']['email'] = "Email Telah Dipakai";
    }
    if ($customer_error_count == 3) {
        break;
    }
}

$data_admin = getDataAll('admin');
foreach ($data_admin as $dataadmin) {
    if ($dataadmin['USERNAME_ADMIN'] == $_POST['username']) {
        $customer_error_count += 1;
        $_SESSION['error']['username'] = "Username Telah Dipakai";
    }
}

//------> C E K I N P U T D A T A

if (!preg_match('/.{5,}/', $_POST['username'])) {
    $_SESSION['error']['username'] = "Minimal 5 Karakter";
}
if (!preg_match('/.{6,}/', $_POST['password'])) {
    $_SESSION['error']['password'] = "Minimal 6 Karakter";
}
if (!preg_match('/^\d{11,}$/', $_POST['notelp'])) {
    $_SESSION['error']['notelp'] = "Minimal 11 Karakter, dan Harus Numeric";
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error']['email'] = "Alamat email valid.";
}

//-----> E K S E K U S I

if (!isset($_SESSION['error'])) {
    regist($_POST, $nameCity, $nameProv);
    header("Location: " . BASEURL . "login.php");
} else {
    header("Location: " . BASEURL . "register.php");
}
