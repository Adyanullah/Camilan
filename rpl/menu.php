<?php
require_once('Database/base.php');
require_once('Database/database.php');
?>


<?php
include("templates/navbar.php");
$produk = getDataAll('barang');
?>
<style>
    .desc {
        font-family: Inter;
        font-size: 14px;
        font-weight: 400;
        line-height: 16.94px;
        text-align: center;
    }

    .titleproduk {
        font-family: InterV;
        font-size: 100%;
        font-weight: 600;
        line-height: 24.2px;
        text-align: center;
        height: 50px;
        overflow: hidden;
        padding: 10px;
        text-size-adjust: initial;

        white-space: nowrap;
        text-overflow: ellipsis;
    }


    .produkimg {
        width: 178px;
        height: 144px;
        top: 155px;
        left: 760px;
        gap: 0px;
        border: 1px 0px 0px 0px;
        opacity: 0px;
        border: 1px solid #FFFFFF
    }

    .keranjangstyle {
        width: 177.98px;
        height: 35.51px;
        gap: 0px;
        opacity: 0px;
        overflow: hidden;
        border: 1px solid #FFFFFF;

        padding: 5% 0 0 0;

        font-family: Inter;
        font-size: 12px;
        font-weight: 400;
        text-align: center;
        color: white;
    }
</style>

<div class="image-container">
    <p>the reason you crave camilan</p>
    <div class="pesan">
        <a href="pesan.php">Pesan sekarang</a>
    </div>
</div>
<div class="box_menudesign" style="
    width: 1041px;
    top: 809px;
    left: 199px;
    border: 1px solid #FFFFFF;
    background: #2F2F2F;
    gap: 0px;
    opacity: 0px;
    ">
    <h1 style="margin: 4vh; color: white; font-family: 'La Belle Aurore';
        font-size: 64px;
        font-weight: 400;
        line-height: 118.56px;
        text-align: center;
        text-shadow: 4px 7px 4px rgba(0, 0, 0, 0.7);
    ">Daftar Produk</h1>





    <section>
        <div class=" container py-5">
            <div class="row">

                <?php if ($produk) : ?>
                    <?php foreach ($produk as $pro) : ?>

                        <div class="card" style="width: 13rem; margin:10px; background:transparent; color:white; border:none;">
                            <div class="card-img-top produkimg" style=" margin-top:10px; background:url('gambar/produk/<?= $pro['FOTO_BARANG'] ?>'); background-size:cover; border-radius:0;"></div>
                            <div class="card-body">
                                <h5 class="card-title titleproduk"><?= $pro['NAMA_BARANG'] ?></h5>
                                <p class="card-text desc">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <p> <?= "Rp " . number_format($pro['HARGA_BARANG'], 0, ',', '.'); ?>,-</p>
                                <?php if (isset($_SESSION['user'])) { ?>
                                    <a href="controller/transaksi/insertcart.php?pro=<?= $pro['ID_BARANG'] ?>" style="display: flex; justify-content:center; text-decoration: none;">
                                        <div class="keranjangstyle">Tambah Ke Keranjang</div>
                                    </a>
                                    <a href="#" style="display: flex; justify-content:center; text-decoration: none; margin-top:10px;">
                                        <div class="keranjangstyle">Komentar (0)</div>
                                    </a>
                                <?php } else { ?>
                                    <a href="login.php" style="display: flex; justify-content:center; text-decoration: none;">
                                        <div class="keranjangstyle">Tambah Ke Keranjang</div>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>

                    <?php endforeach ?>
                <?php endif ?>

            </div>
        </div>

    </section>
</div>

<?php include("templates/footer.php") ?>