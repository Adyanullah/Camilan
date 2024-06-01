<?php
require_once('../../Database/base.php');
require_once('../../Database/database.php');

if (isset($_SESSION['admin'])) {
    deletebarang($_GET['pro']);
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
} else {
    header('Location: ' . BASEURL . 'login.php');
}
