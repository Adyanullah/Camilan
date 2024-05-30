<?php
require_once("../../Database/base.php");
require_once("../../Database/database.php");

updatevalue('pesanan', 'Status', 1, 'ID_ORDER', $_GET['Order']);
$previousPage = $_SERVER['HTTP_REFERER'];
header("Location: $previousPage");
