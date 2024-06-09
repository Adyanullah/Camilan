<?php
require_once('../Database/base.php');
require_once('../Database/database.php');

session_start(); // Start the session

// Check if the user session variable is set
if (isset($_SESSION['admin'])) {
    // Unset the user session variable
    unset($_SESSION['admin']);
}
header("Location: ../index.php"); // Redirect jika index berhasil