<?php $title = "Manajemen Produk" ?>
<?php
require_once('../Database/base.php');
require_once('../Database/database.php');
?>

<?php
$result = getDataAll('barang');

$per_page = 4; // Number of items per page
$total_results = count($result);
$total_pages = ceil($total_results / $per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$start = ($page - 1) * $per_page;
$produk = getDataAllLimit('barang', $start, $per_page);
?>
<?php include("../templates/header-admin.php") ?>
<!-- content -->
<div class="d-flex flex-column" style="min-height:70vh; width:100%;">
    <?php if ($produk) : ?>
        <?php foreach ($produk as $pro) : ?>
            <div class="py-3 ps-4 mt-4 d-flex" style="width: 78%; background: #D9D9D9; align-self:center;">
                <img style="min-width: 8vw; min-height: 12vh; max-width: 8.01vw; max-height: 12.01vh; border: 1px white solid" src="../gambar/produk/<?= $pro['FOTO_BARANG'] ?>" />
                <div class="ms-2 d-flex flex-column">
                    <div class="text-dark fw-bold d-inline-block text-truncate"><?= $pro["NAMA_BARANG"]; ?></div>
                    <div class="text-dark mt-2 d-inline-block text-truncate">Harga : Rp. <?= number_format($pro['HARGA_BARANG'], 0, ',', '.'); ?></div>
                </div>
                <div class="d-flex align-items-center justify-content-end" style="width: 76%;">
                    <a href="<?= BASEURL . 'admin/editproduk.php?product=' . $pro['ID_BARANG'] ?>" style="padding: 10px;" class="d-flex flex-column justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-pencil" viewBox="0 0 23 23">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            <text x="1" y="23" font-family="Arial" font-size="8" fill="black">Edit</text>
                        </svg>

                    </a>
                    <a href="<?= BASEURL . 'controller/admin/deleteproduk.php?pro=' . $pro['ID_BARANG'] ?>" style="padding: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-trash" viewBox="0 0 23 23">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                            <text x="1" y="23" font-family="Arial" font-size="8" fill="black">Delete</text>

                        </svg>
                    </a>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</div>
<div class="d-flex mb-5 mt-5">
    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
        <a class="border border-2 text-decoration-none px-2 py-1 my-4 mx-1" style="color: black;" href='?page=<?= $i ?>'>
            <div class="paginate-link p-0 m-0" style="width:100%; height:100%">
                <?= $i; ?>
            </div>
        </a>
    <?php endfor; ?>
</div>

<?php include("../templates/footer-admin.php") ?>