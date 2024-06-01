<?php
require_once("../../Database/base.php");
require_once("../../Database/database.php");

if ($_SESSION['user']) {
    insertcart($POST);
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
} else {
    header('Location: ../../login.php');
}
