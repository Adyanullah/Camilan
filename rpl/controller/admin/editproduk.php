<?php
require_once('../../Database/base.php');
require_once('../../Database/database.php');


updateProduct([$_POST, $_FILES]);

header("Location: ../tambahproduk.php");
exit();
