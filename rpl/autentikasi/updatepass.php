<?php
require_once('../Database/base.php');
require_once('../Database/database.php');


updateakun($_POST['password'], $_POST['id']);
header("Location: ../login.php");
exit();
