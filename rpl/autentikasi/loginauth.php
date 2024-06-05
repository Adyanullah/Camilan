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
$data = getDataAll('admin');
foreach ($data as $admindata) {
    if ($_POST['username'] == $admindata['USERNAME_ADMIN'] && $_POST['password'] == $admindata['PASSWORD_ADMIN']) {
        $_SESSION['admin'] = $admindata;
        $gagal = false; // Login berhasil
        break; // Keluar dari loop jika login berhasil
    }
}

//Check Error Jika gagal
if ($gagal) {
    $username = false;
    $password = false;
    $data = getDataAll('customer');
    foreach ($data as $userdata) {
        if ($_POST['username'] == $userdata['USERNAME']) {
            $username = true; // detected
            break; // Keluar dari loop jika login berhasil
        }
    }
    $data = getDataAll('admin');
    foreach ($data as $userdata) {
        if ($_POST['username'] == $userdata['USERNAME_ADMIN']) {
            $username = true; // detected
            break; // Keluar dari loop jika login berhasil
        }
    }
    if ($username) {
        $data = getDataAll('customer');
        foreach ($data as $userdata) {
            if ($_POST['password'] == $userdata['PASSWORD']) {
                $password = true; // detected
                break; // Keluar dari loop jika login berhasil
            }
        }
        $data = getDataAll('admin');
        foreach ($data as $userdata) {
            if ($_POST['password'] == $userdata['PASSWORD_ADMIN']) {
                $password = true; // detected
                break; // Keluar dari loop jika login berhasil
            }
        }
    }
    if (!$username) {
        $_SESSION['error']['username'] = "Username Salah atau Belum Terdaftar !!";
    } elseif (!$password) {
        $_SESSION['error']['password'] = "Password Salah !!";
    }
}

if ($gagal) {
    echo "Login gagal. Silakan coba lagi.";
    header("Location: ../login.php"); // Redirect jika login gagal
} else {
    if (isset($_SESSION['admin']) and !isset($_SESSION['user'])) {
        header("Location: " . BASEURL . "admin");
    } elseif (isset($_SESSION['user'])) {
        header("Location: " . BASEURL . "index.php"); // Redirect jika index berhasil
    }
    exit;
}
