<?php
require_once('../../Database/base.php');
require_once('../../Database/database.php');


deletebarangdikeranjang($_GET['pro']);

header("Location: ../../keranjang.php");
exit();
