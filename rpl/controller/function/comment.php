<?php
require_once("../../Database/base.php");
require_once("../../Database/database.php");


if ($_SESSION['user']) {
    say_comment($_POST);
} else {
    header('Location: ../../login.php');
}
$previousPage = $_SERVER['HTTP_REFERER'];
header("Location: $previousPage");
