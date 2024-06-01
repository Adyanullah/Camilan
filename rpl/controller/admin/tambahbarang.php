<?php
require_once('../../Database/base.php');
require_once('../../Database/database.php');

if (isset($_SESSION['admin'])) {
    addProduct([$_POST, $_FILES]);

    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
} else {
    header('Location: ' . BASEURL . 'login.php');
}
