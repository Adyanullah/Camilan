<?php
require_once('../../Database/base.php');
require_once('../../Database/database.php');


updateProduct([$_POST, $_FILES]);

$previousPage = $_SERVER['HTTP_REFERER'];
header("Location: $previousPage");
exit();
