<?php
require_once('../Database/base.php');
require_once('../Database/database.php');

updatevalue('customer', 'PASSWORD', $_POST['password'], 'ID_CUSTOMER', $_POST['id']);
$_SESSION['status'] = "Berhasil Mengubah Password";
if (isset($_SESSION['user'])) {
    header("Location: " . BASEURL . "profile");
} else {
    header("Location: ../login.php");
}
exit();
