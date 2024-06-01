<?php
require_once("../../Database/base.php");
require_once("../../Database/database.php");

if ($_SESSION['user']) {
    pluscart($_GET['pro'], $_SESSION['user']['ID_CUSTOMER'], $_GET['w']);
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
} else {
    header('Location: ../../login.php');
}
