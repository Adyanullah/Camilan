<?php 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebsiteCamilan</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include("navbar.php") ?>
    <div class="image-container">
        <p>the reason you crave camilan</p>
        <div class="pesan">
            <a href="pesan.php">Pesan sekarang</a>
        </div>
    </div>
    <div class="konten">
        <img src="gambar/basreng.webp" alt="" width="40%">
        <div class="container">
            <div class="judul">Basreng</div>
            <div class="tulisan">
                <p>Basreng merupakan singkatan dari bakso digoreng. Camilan yang satu ini berasa dari Sunda, seperti kota Bandung.</p>
                <p>Bahan utama yang digunakan untuk membuat camilan ini adalah bakso ikan, yang diberi berbagai bumbu khusus sebelum digoreng. Proses penggorengan ini adalah kunci dari cita rasa Basreng yang unik; membuatnya memiliki tekstur yang krispi di luar dan lembut di dalam.</p>
            </div>

        </div>

    </div>
    <div class="konten2">
        <img src="gambar/makaroni.jpg" alt="" width="40%">
        <div class="container">
            <div class="judul">Makaroni</div>
            <div class="tulisan">Cemilan ini memiliki bentuk seperti buluh pipa, yang dilapisi dengan bumbu cabai dan rempah-rempah lainnya. Rasanya tidak terlalu pedas, kamu bisa memakannya dengan santai.</div>
        </div>
    </div>
    <?php include("footer.php") ?>
</body>
</html>