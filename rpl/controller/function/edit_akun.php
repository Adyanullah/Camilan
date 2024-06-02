<?php
require_once('../../Database/base.php');
require_once('../../Database/database.php');

//------ > C E K D A T A B A S E
$data_customer = getDataAll('customer');
$customer_error_count = 0;
foreach ($data_customer as $datac) {
    if ($datac['USERNAME'] == $_POST['username'] && $_POST['username'] != $_SESSION['user']['USERNAME']) {
        $customer_error_count += 1;
        $_SESSION['error']['username'] = "Username Telah Dipakai";
    }
    if ($datac['NOMOR_TELPON_CUSTOMER'] == $_POST['notelp'] && $_POST['notelp'] != $_SESSION['user']['NOMOR_TELPON_CUSTOMER']) {
        $customer_error_count += 1;
        $_SESSION['error']['notelp'] = "Nomor Telepon Telah Dipakai";
    }
    if ($datac['EMAIL'] == $_POST['email'] && $_POST['email'] != $_SESSION['user']['EMAIL']) {
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
if (!preg_match('/^\d{11,}$/', $_POST['notelp'])) {
    $_SESSION['error']['notelp'] = "Minimal 11 Karakter, dan Harus Numeric";
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error']['email'] = "Alamat email valid.";
}

//-----> E K S E K U S I

if (!isset($_SESSION['error'])) {
    edit_akun($_POST['fullname'], $_POST['username'], $_POST['notelp'], $_POST['email'], $_POST['edit_user']);
    $new_session = getDataAllWhere('customer', 'ID_CUSTOMER', $_POST['edit_user']);
    $new_session = $new_session[0];
    $_SESSION['user'] = $new_session;
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
} else {
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: " . BASEURL . "profile?errors=true");
}
