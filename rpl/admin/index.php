<?php
require_once('../Database/base.php');
require_once('../Database/database.php');

$result = getDataAllJoin('pesanan', 'customer', 'ID_CUSTOMER');

$per_page = 5; // Number of items per page
$total_results = count($result);
$total_pages = ceil($total_results / $per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$start = ($page - 1) * $per_page;

$pesanan = getDataAllJoinLimit('pesanan', 'customer', 'ID_CUSTOMER', $start, $per_page);
// die;
?>

<?php include("../templates/header-admin.php") ?>


<!-- <div class="my-4" style="width: 305px; height: 63px; background: rgba(217, 217, 217, 0); border: 1px black solid;">
    <div style="padding-top:5%; width: 100%; text-align: center; font-size: 20px; font-family: Inter; font-weight: 400; word-wrap: break-word">Management Transaksi</div>
</div> -->
<?php $table_color = "#D9D9D9;" ?>
<div class="row" style="width: 85%;">
    <div class="border border-dark py-4 fw-bold col-sm-1 text-center" style="background-color: <?= $table_color; ?>;">No.</div>
    <div class="border border-dark py-4 fw-bold col text-center" style="background-color: <?= $table_color; ?>;">Nama</div>
    <div class="border border-dark py-4 fw-bold col text-center" style="background-color: <?= $table_color; ?>;">Status Transaksi</div>
    <div class="border border-dark py-4 fw-bold col text-center" style="background-color: <?= $table_color; ?>;">Action</div>
</div>
<?php
$row_count = 0;
foreach ($pesanan as $order) :
    $row_count += 1;
    if ($row_count % 2 == 1) {
        $table_color = "#A6A6A6;";
    } else {
        $table_color = "#D9D9D9;";
    }
?>
    <div class="row" style="width: 85%;">
        <div class="border border-dark py-3 fw-bold col-sm-1 text-center d-flex flex-column align-items-center" style="background-color: <?= $table_color; ?>;"><?= $row_count; ?>.</div>
        <div class="border border-dark py-3 fw-bold col text-center d-flex flex-column align-items-center" style="background-color: <?= $table_color; ?>;"><?= $order['NAMA_CUSTOMER']; ?></div>
        <?php if ($order['Status'] == 0) : ?>
            <div class="border border-dark py-3 fw-bold col text-center d-flex flex-column align-items-center" style="background-color: <?= $table_color; ?>;">
                <div style="color: red; font-size: 12px">Pesanan Menunggu Konfirmasi</div>
                <a href="detail_pesanan.php?DetailPesanan=<?= $order['ID_ORDER'] ?>" style="width:35%; border: 1px solid red; border-radius:1rem; background-color:red; text-decoration:none; color:black;">
                    <div class="p-0 m-0" style="font-size: 10px; text-align:center;">Detail Pesanan</div>
                </a>
            </div>
            <div class="border border-dark py-3 fw-bold col text-center d-flex flex-column justify-content-center align-items-center" style="background-color: <?= $table_color; ?>;">
                <a href="#" style="border-radius:1rem; border:1px solid #7DE9A8; background-color: #7DE9A8; font-size:14px; width:45%; color:#000; text-decoration:none;">
                    Konfirmasi
                </a>
            </div>
        <?php else : ?>
            <div class="border border-dark py-3 fw-bold col text-center d-flex flex-column align-items-center" style="background-color: <?= $table_color; ?>;">
                <div style="color: red; font-size: 12px">Pesanan Telah Dikonfirmasi</div>
                <a href="detail_pesanan.php?DetailPesanan=<?= $order['ID_ORDER'] ?>" style="width:35%; border: 1px solid red; border-radius:1rem; background-color:red; text-decoration:none; color:black;">
                    <div class="p-0 m-0" style="font-size: 10px; text-align:center;">Detail Pesanan</div>
                </a>
            </div>
            <div class="border border-dark py-3 fw-bold col text-center d-flex flex-column justify-content-center align-items-center" style="background-color: <?= $table_color; ?>; font-size:14px;">Selesai</div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
<div class="d-flex">
    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
        <a class="border border-2 text-decoration-none px-2 py-1 my-4 mx-1" style="color: #000;" href='?page=<?= $i ?>'>
            <div class="paginate-link p-0 m-0" style="width:100%; height:100%">
                <?= $i; ?>
            </div>
        </a>
    <?php endfor; ?>
</div>


<?php include("../templates/footer-admin.php") ?>