<?php
require_once('../Database/base.php');
require_once('../Database/database.php');

session_start(); // Mulai session

$gagal = true; // Kondisi gagal

// Cek apakah username dan password yang diterima dari form adalah benar (biasanya dilakukan validasi di sini)

$data = getDataAll('customer');
foreach ($data as $userdata) {
    if ($_POST['username'] == $userdata['USERNAME'] && $_POST['password'] == $userdata['PASSWORD']) {
        $_SESSION['user'] = $userdata;
        $gagal = false; // Login berhasil
        break; // Keluar dari loop jika login berhasil
    }
}

if ($gagal) {
    echo "Login gagal. Silakan coba lagi.";
    header("Location: ../login.php"); // Redirect jika login gagal
} else {
    header("Location: ../index.php"); // Redirect jika index berhasil
    exit;
}
