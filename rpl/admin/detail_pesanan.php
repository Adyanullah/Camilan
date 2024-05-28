<?php
require_once('../Database/base.php');
require_once('../Database/database.php');

$pesanan = getDataAllJoinWhere('detail_pesanan', 'barang', 'ID_BARANG', 'ID_ORDER', $_GET['DetailPesanan']);
// var_dump($_GET);
// die;
?>

<?php include("../templates/header-admin.php") ?>

<?php $table_color = "#D9D9D9;" ?>
<div class="row pt-5" style="width: 85%;">
    <div class="border border-dark py-4 fw-bold col-sm-1 text-center" style="background-color: <?= $table_color; ?>;">No.</div>
    <div class="border border-dark py-4 fw-bold col-md-3 text-center" style="background-color: <?= $table_color; ?>;">Nama Makanan</div>
    <div class="border border-dark py-4 fw-bold col-md-3 text-center" style="background-color: <?= $table_color; ?>;">Harga</div>
    <div class="border border-dark py-4 fw-bold col text-center" style="background-color: <?= $table_color; ?>;">Jumlah</div>
    <div class="border border-dark py-4 fw-bold col-md-3 text-center" style="background-color: <?= $table_color; ?>;">Total</div>
</div>
<?php
$row_count = 0;
$total_harga = 0;
foreach ($pesanan as $order) :
    $total_harga += $order['HARGA'];
    $row_count += 1;
    if ($row_count % 2 == 1) {
        $table_color = "#A6A6A6;";
    } else {
        $table_color = "#D9D9D9;";
    }
?>
    <div class="row" style="width: 85%;">
        <div class="border border-dark py-3 fw-bold col-sm-1 text-center d-flex flex-column align-items-center" style="background-color: <?= $table_color; ?>;"><?= $row_count; ?>.</div>
        <div class="border border-dark py-3 fw-bold col-md-3 text-center d-flex flex-column align-items-center" style="background-color: <?= $table_color; ?>;"><?= $order['NAMA_BARANG']; ?></div>
        <div class="border border-dark py-3 fw-bold col-md-3 text-center d-flex flex-column align-items-center" style="background-color: <?= $table_color; ?>;"><?= "Rp. " . number_format($order['HARGA_BARANG'], 0, ',', '.'); ?></div>
        <div class="border border-dark py-3 fw-bold col text-center d-flex flex-column align-items-center" style="background-color: <?= $table_color; ?>;"><?= $order['JUMLAH_PRODUK']; ?></div>
        <div class="border border-dark py-3 fw-bold col-md-3 text-center d-flex flex-column align-items-center" style="background-color: <?= $table_color; ?>;"><?= "Rp. " . number_format($order['HARGA'], 0, ',', '.'); ?></div>
    </div>
<?php endforeach; ?>
<div class="row" style="width: 85%;">
    <div class="border border-dark py-3 fw-bold col text-center d-flex flex-column align-items-center" style="background-color: <?= $table_color; ?>;">Total Pembelian</div>
    <div class="border border-dark py-3 fw-bold col-md-3 text-center d-flex flex-column align-items-center" style="background-color: <?= $table_color; ?>;"><?= "Rp. " . number_format($total_harga, 0, ',', '.'); ?></div>
</div>


<?php include("../templates/footer-admin.php") ?>