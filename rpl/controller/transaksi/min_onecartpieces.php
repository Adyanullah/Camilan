<?php
require_once("../../Database/base.php");
require_once("../../Database/database.php");

if ($_SESSION['user']) {
    mincart($_GET['pro'], $_SESSION['user']['ID_CUSTOMER']);
} else {
    header('Location: ../../login.php');
}