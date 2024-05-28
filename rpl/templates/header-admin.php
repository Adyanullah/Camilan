<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebsiteCamilan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASEURL . 'css/style.css' ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>
<?php echo "<body>" ?>
<div class="d-flex">
    <div class="sidebar_admin" style="width: 20vw; height:100vh; background-color:#242323;">
        <div class="sidebar-title d-flex flex-column justify-content-center" style="height: 16%; width:100%;">
            <div class="toko-camilan text-light text-center" style="margin-top: 10%; height: 47%; font-size: 24px; font-family: Times New Roman; font-weight: 400; word-wrap: break-word;">Toko Camilan's</div>
            <div style="margin-left: 3%; width: 90%; height: 0px; border: 1px white solid"></div>
        </div>
        <div class="sidebar-menu d-flex flex-column" style="background-color: #3E3E3E; height: 84%; width:100%;">
            <div style="margin: 20px 0 0 0; text-align: center; color: white; font-size: 20px; font-family: Inter; font-weight: 400; word-wrap: break-word">Halaman Utama</div>
            <div style="margin: 20px 0 0 0; text-align: center; color: white; font-size: 20px; font-family: Inter; font-weight: 400; word-wrap: break-word">Detail Produk</div>
            <div style="margin: 20px 0 0 0; text-align: center; color: white; font-size: 20px; font-family: Inter; font-weight: 400; word-wrap: break-word">Management Transaksi</div>
            <div style="margin: 20px 0 0 0; text-align: center; color: white; font-size: 20px; font-family: Inter; font-weight: 400; word-wrap: break-word">Tambah Produk</div>
            <div style="margin: 20px 0 0 0; text-align: center; color: white; font-size: 20px; font-family: Inter; font-weight: 400; word-wrap: break-word">Detail Pesanan</div>
        </div>
    </div>
    <div class="layar-admin bg-white" style="width: 79vw; height:100vh;">
        <div class="navbar-admin" style="background-color: #000; height: 14%; width:100%;"></div>
        <div class="content-menu" style="height: 86%; width:100%; display:flex; flex-direction:column; align-items:center;">