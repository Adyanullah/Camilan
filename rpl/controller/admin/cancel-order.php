<?php
require_once("../../Database/base.php");
require_once("../../Database/database.php");

if (isset($_SESSION['admin'])) {
    updatevalue('pesanan', 'Status', 2, 'ID_ORDER', $_GET['Order']);
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
} else {
    header('Location: ' . BASEURL . 'login.php');
}
