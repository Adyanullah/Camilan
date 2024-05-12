<?php
require_once('../Database/base.php');
require_once('../Database/database.php');


regist($_POST);
header("Location: ../login.php");
exit();
