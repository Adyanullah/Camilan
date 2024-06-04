<?php
$result = getDataAllWhere('pesanan', 'ID_CUSTOMER', $_SESSION['user']['ID_CUSTOMER']);
$per_page = 3; // Number of items per page
$total_results = count($result);
$total_pages = ceil($total_results / $per_page);


if (!isset($_GET['MyOrder_Page'])) {
    $page = 1;
} else {
    $page = $_GET['MyOrder_Page'];
}

$start = ($page - 1) * $per_page;
$orders = getDataAllWhereLimit('pesanan', 'ID_CUSTOMER', $_SESSION['user']['ID_CUSTOMER'], $start, $per_page);

?>
<div id="page3" class="page">
    <div style="margin: 3.9vh 0 2.3vh 0; color: black; font-size: 18px; font-family: Inter; font-weight: 700; word-wrap: break-word">My Order</div>
    <?php foreach ($orders as $order) : ?>
        <div style="margin-bottom: 2.4vh; display:flex; flex-direction:column;">
            <div style="width: 700px; height: 150px; background: rgba(217, 217, 217, 0); border: 0.50px #999595 solid">
                <div class="title-myorder" style="display: flex; align-items:center; margin-top:0.7vh;">
                    <img style="width: 25px; height: 25px; margin: 0 6px 0 6px;" src="<?= BASEURL ?>./gambar/profile/MyOrder.png" />
                    <div style="margin: 0 3px 0 3px; color: #6D6666; font-size: 14px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?= $order['TANGGAL_ORDER']; ?><br /></div>
                    <div style="margin: 0 3px 0 6px; align-items:center; text-align:center; padding:0.54vh 0.54vh 0 0.54vh; min-width: 90px; max-height: 25px; background: #D9D9D9; color: #7C7676; font-size: 12px; font-family: Inter; font-weight: 400; word-wrap: break-word">
                        <?php if ($order['Status'] == 0) : ?>
                            Sedang Di Proses<br />
                        <?php elseif ($order['Status'] == 1) : ?>
                            Pesanan Selesai<br />
                        <?php else : ?>
                            Menunggu Pembayaran<br />
                        <?php endif; ?>
                    </div>
                </div>
                <div class="detail-myorder" style="display: flex; justify-content:space-between; margin: 0.4vh 0 0 0">
                    <div class="column" style="margin-left: 1vw;">
                        <div style="color: #555252; font-size: 12px; font-family: Inter; font-weight: 400; word-wrap: break-word">CAL081708660862086303300752</div>
                    </div>
                    <form action="" method="POST">
                        <div class="column" style="margin-right: 1.9vw; text-align:right;">
                            <div style="color: #6B6B6B; font-size: 14px; font-family: Inter; font-weight: 400; word-wrap: break-word">Total Amount<br /></div>
                            <div style="color: black; font-size: 14px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?= "Rp " . number_format($order['TOTAL_ORDER'], 0, ',', '.'); ?><br /></div>
                            <input type="hidden" name="order_id" value="<?= $order["ID_ORDER"]; ?>">
                            <input type="submit" id="page5Btn" style="color: black; font-size: 14px; font-family: Inter; font-weight: 400; text-decoration: underline; word-wrap: break-word; margin: 3.5vh 0 0 0; border:none; background-color:transparent; padding:0;" value="View Details">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="d-flex justify-content-center pe-5 me-5">
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <a class="border border-2 text-decoration-none px-2 py-1 my-4 mx-1" style="color: #000;" href='?MyOrder_Page=<?= $i ?>'>
                <div class="paginate-link p-0 m-0" style="width:100%; height:100%">
                    <?= $i; ?>
                </div>
            </a>
        <?php endfor; ?>
    </div>
</div>