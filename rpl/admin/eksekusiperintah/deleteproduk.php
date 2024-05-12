<?php
require_once('../../Database/base.php');
require_once('../../Database/database.php');


deletebarang($_GET['pro']);

header("Location: ../listallproduk.php");
exit();
