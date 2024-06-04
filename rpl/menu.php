<?php
require_once('Database/base.php');
require_once('Database/database.php');
?>


<?php
$per_page = 8; // Number of items per page

if (!isset($_GET['Menu_Page'])) {
    $page = 1;
} else {
    $page = $_GET['Menu_Page'];
}
$start = ($page - 1) * $per_page;
if (isset($_GET['rasa'])) {
    $result = getDataAllLIKE('barang', 'VARIAN', $_GET['rasa']);
    $total_results = count($result);
    $total_pages = ceil($total_results / $per_page);
    $produk = getDataAllLIKELimit('barang', 'VARIAN', $_GET['rasa'], $start, $per_page);
} else {
    $result = getDataAll('barang');
    $total_results = count($result);
    $total_pages = ceil($total_results / $per_page);
    $produk = getDataAllLimit('barang', $start, $per_page);
}

include("templates/navbar.php");
?>
<style>
    .desc {
        font-family: Inter;
        font-size: 14px;
        font-weight: 400;
        line-height: 16.94px;
        text-align: center;
        width: 100%;
        height: auto;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;

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

    /* .card-title {
        font-family: InterV;
        font-size: 18px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 50px;
        text-align: center;
    }*/

    .shrink {
        white-space: nowrap;
        /* font-size: 80px; */
        overflow: hidden;
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
    <p>Belanja Puas Harga Pass !!!</p>
    <div class="pesan">
        <a href="menu.php">Pesan sekarang</a>
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
    margin-top:-10vh;
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
                                <div class="card-title titleproduk">
                                    <p class="shrink"><?= $pro['NAMA_BARANG'] ?></p>
                                </div>
                                <p class="card-text desc"><?= $pro['Deskripsi']; ?></p>
                                <p> <?= "Rp " . number_format($pro['HARGA_BARANG'], 0, ',', '.'); ?>,-</p>
                                <a href="<?= BASEURL . 'viewProduct.php?product=' . $pro['ID_BARANG'] ?>" style="display: flex; justify-content:center; text-decoration: none;">
                                    <div class="keranjangstyle">Lihat Produk</div>
                                </a>
                            </div>
                        </div>

                    <?php endforeach ?>
                <?php endif ?>

            </div>
        </div>
        <div class="d-flex justify-content-center">
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <a class="border border-2 text-decoration-none px-2 py-1 my-4 mx-1" style="color: black;" href='?Menu_Page=<?= $i ?>'>
                    <div class="paginate-link p-0 m-0" style="width:100%; height:100%; background-color:transparent; color:black">
                        <?= $i; ?>
                    </div>
                </a>
            <?php endfor; ?>
        </div>
    </section>
</div>

<?php include("templates/footer.php") ?>
<script>
    // for (const element of document.getElementsByClassName("shrink")) {
    //     var size = parseInt(getComputedStyle(element).getPropertyValue('font-size'));
    //     const parent_width = parseInt(getComputedStyle(element.parentElement).getPropertyValue('width'))
    //     while (element.offsetWidth > parent_width) {
    //         element.style.fontSize = size + "px"
    //         size -= 1
    //     }
    // }
</script>