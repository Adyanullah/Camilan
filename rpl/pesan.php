<?php
// require_once('Database/base.php');
// require_once('Database/database.php');
?>


<?php

// Pastikan konstanta DB telah didefinisikan dengan benar
define('DB', mysqli_connect('localhost', 'root', '', 'db_camilan'));

// Panggil prosedur tersimpan "getallbarang"
$result = mysqli_query(DB, "CALL getallbarang()");

// Periksa apakah query berhasil dieksekusi
if ($result) {
    // Ambil hasil query sebagai array assosiatif
    $produk = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // Tampilkan hasil dengan print_r
    print_r($produk);
} else {
    echo "Error executing the query.";
}

// Tutup koneksi setelah selesai menggunakan database
mysqli_close(DB);


?>