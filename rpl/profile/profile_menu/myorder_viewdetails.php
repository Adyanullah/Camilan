<?php if (isset($_POST['order_id'])) : ?>
    <?php $order_detail = getDataAllWhere2JOIN('pesanan', 'ID_CUSTOMER', $_SESSION['user']['ID_CUSTOMER'], 'AND', 'ID_ORDER', $_POST['order_id'], 'metode_pembayaran', 'ID_METODE_PEMBAYARAN') ?>
    <?php $order_detail_item = DataOrderDetailTransaction($_POST['order_id']) ?>
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
                        <div class="text-grey">ORD<?= $_SESSION['user']['NOMOR_TELPON_CUSTOMER'] ?><?= $order_detail[0]['ID_ORDER']; ?></div>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-4">
                        <div class="text-grey">Order Date</div>
                        <div class="text-grey"><?= $order_detail[0]['TANGGAL_ORDER']; ?><br /></div>
                    </div>
                </div>

                <div style="color: black; font-size: 18px; font-family: Inter; font-weight: 700; word-wrap: break-word">Order Detail</div>
                <div class="d-flex justify-content-between" style="width: 49vw;">
                    <div style="color: black; font-size: 18px; font-family: Inter; font-weight: 400; word-wrap: break-word">Product</div>
                    <div style="color: black; font-size: 18px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?= count($order_detail_item); ?> Item</div>
                </div>
                <div class="d-flex flex-column" style="width: 49vw; height: 0px; border: 1px #6B6B6B solid"></div>
                <?php $harga_non_ongkir = 0; ?>
                <?php foreach ($order_detail_item as $orderitem) : ?>
                    <div class="d-flex my-4">
                        <img class="pl-2" style="min-height: 17.39vh; min-width:12.79vw;max-height: 17.4vh; max-width:12.8vw;" src="<?= BASEURL . 'gambar/produk/' . $orderitem['FOTO_BARANG']; ?>" alt="">
                        <div class="ms-3">
                            <div class="row">
                                <div class="fw-bold"><?= $orderitem['NAMA_BARANG']; ?> ( <?= $orderitem['NAMA_KATEGORI']; ?> )</div>
                            </div>
                            <div class="row">
                                <div style="font-size: 14px;">Qty <?= $orderitem['JUMLAH_PRODUK']; ?> x <?= "Rp." . number_format($orderitem['HARGA_BARANG'], 0, ',', '.'); ?></div>
                                <?php $harga_non_ongkir += ($orderitem['HARGA_BARANG'] * $orderitem['JUMLAH_PRODUK']) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="text-dark fw-bold my-4 fs-5">Delivery Details</div>
                <div class="card px-4 py-2 border-2" style="border-radius: 10px;">
                    <div class="row border-bottom border-1 border-dark my-2">
                        <div class="fw-lighter">Delivery Type</div>
                        <div class="text-dark">Official Delivery</div>
                    </div>
                    <div class="row my-2">
                        <div class="fw-lighter">Address</div>
                        <div class="text-dark"><?= $_SESSION['user']['NAMA_CUSTOMER'] ?></div>
                        <div class="text-dark"><?= $_SESSION['user']['PROVINSI'] ?>,<?= $_SESSION['user']['KOTA'] ?></div>
                        <div class="text-dark"><?= $_SESSION['user']['ALAMAT'] ?></div>
                        <div class="text-dark"><?= $_SESSION['user']['NOMOR_TELPON_CUSTOMER'] ?></div>
                    </div>
                </div>
                <div class="text-dark fw-bold my-4 fs-5">Payment Details</div>
                <div class="card px-4 py-2 border-2" style="border-radius: 10px;">
                    <div class="row border-bottom border-1 border-dark my-2">
                        <div class="col">Payment Method</div>
                        <div class="col text-end"><?= $order_detail[0]['NAMA_METODE_PEMBAYARAN']; ?> Virtual Account</div>
                    </div>
                    <div class="row border-bottom border-1 border-dark my-2">
                        <div class="col">Total Price</div>
                        <div class="col text-end">Rp. <?= number_format($harga_non_ongkir, 0, ',', '.') ?></div>
                    </div>
                    <div class="row border-bottom border-1 border-dark my-2">
                        <div class="col">Delivery Fee</div>
                        <div class="col text-end">Fee Rp. Rp. <?= number_format($order_detail[0]['TOTAL_ORDER'] - $harga_non_ongkir, 0, ',', '.') ?></div>
                    </div>
                    <div class="row border-bottom border-1 border-dark my-2">
                        <div class="col">TOTAL</div>
                        <div class="col text-end">Rp. <?= number_format($order_detail[0]['TOTAL_ORDER'], 0, ',', '.') ?></div>
                    </div>
                </div>
        </div>
    <?php endif; ?>