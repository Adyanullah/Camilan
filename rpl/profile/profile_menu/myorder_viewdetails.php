<?php if (isset($_GET['order_id'])) : ?>
    <?php $order_detail = getDataAllWhere2('pesanan', 'ID_CUSTOMER', $_SESSION['user']['ID_CUSTOMER'], 'AND', 'ID_ORDER', $_GET['order_id']) ?>
    <?php $order_detail_item = getDataAllWhere('detail_pesanan', 'ID_ORDER', $_GET['order_id']) ?>
    <div id="page5" class="page">
        <div style="margin: 3.9vh 0 2.3vh 0; color: black; font-size: 18px; font-family: Inter; font-weight: 700; word-wrap: break-word"><- Transaction Detail</div>
                <div class="border border-2" style="width: 49vw; height:20vh; border-radius:1em">
                    <div class="d-flex justify-content-between py-2 px-4">
                        <div class="text-grey">Status</div>
                        <div style=" border-radius:1em; margin: 0 3px 0 6px; align-items:center; text-align:center; padding:0.54vh 0.94vh 0 0.94vh; min-width: 90px; max-height: 25px; background: #D9D9D9; color: #7C7676; font-size: 12px; font-family: Inter; font-weight: 400; word-wrap: break-word">
                            <?php if ($order_detail[0]['Status'] == 0) : ?>
                                Sedang Di Proses<br />
                            <?php elseif ($order_detail[0]['Status'] == 1) : ?>
                                Pesanan Selesai<br />
                            <?php else : ?>
                                Menunggu Pembayaran<br />
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-4">
                        <div class="text-grey">Order ID</div>
                        <div class="text-grey">CAL081708660862086303300752</div>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-4">
                        <div class="text-grey">Order Date</div>
                        <div class="text-grey"><?= $order['TANGGAL_ORDER']; ?><br /></div>
                    </div>
                </div>

                <div style="color: black; font-size: 18px; font-family: Inter; font-weight: 700; word-wrap: break-word">Order Detail</div>
                <div class="d-flex justify-content-between" style="width: 49vw;">
                    <div style="color: black; font-size: 18px; font-family: Inter; font-weight: 400; word-wrap: break-word">Product</div>
                    <div style="color: black; font-size: 18px; font-family: Inter; font-weight: 400; word-wrap: break-word">2 Item</div>
                </div>
                <div style="width: 49vw; height: 0px; border: 1px #6B6B6B solid"></div>
        </div>
    <?php endif; ?>