<?php
require_once('Database/base.php');
require_once('Database/database.php');

if (!isset($_SESSION['user'])) {
    header('location: login.php');
    exit();
}

$keranjanganda = getListKeranjang($_SESSION['user']['ID_CUSTOMER']);
$jumlah_produk = 0;
$sumprice = 0;
$berat = 0;
$stringlist = "";
foreach ($keranjanganda as $price) {
    $sumprice = $sumprice + $price['TotalHarga'];
    $stringlist = $stringlist . $price['ID_BARANG'] . ',';
    $berat += $price['Berat'];
    $jumlah_produk += $price['Jumlah'];
}
$stringlist = rtrim($stringlist, ", ");


// AMBIL HARGA ONGKIR DARI RAJAONGKIR API------------------------

require_once "controller/function/ongkir.php";
$data = new rajaongkir();

$kota_tujuan = $_SESSION['user']['ID_KOTA'];
$kota_asal = 31;

if ($berat > 0) {
    $harga_ongkir = json_decode($data->get_cost($kota_asal, $kota_tujuan, $berat, 'jne'), true);
    $cost = $harga_ongkir["rajaongkir"]["results"][0]["costs"][0]["cost"][0]["value"];
} else {
    $cost = 0;
}
?>


<?php
include("templates/navbar.php")
?>
<style>
    .payinfo {
        width: 38vw;
        min-height: 80.4vh;
        gap: 0px;
        border: 10px 0px 0px 0px;
        opacity: 0px;
        background: #313131;
        border: 10px solid #00000024;
        position: relative;
        padding-left: 2.9vw;
        padding-right: 2.9vw;
    }

    .cartinfo {
        width: 61vw;
        display: flex;
        justify-content: center;
        position: relative;
    }

    .cartlist {
        width: 46.9vw;
        min-height: 300px;
        margin-top: 185px;
        margin-bottom: 10vh;
        gap: 0px;
        border: 7px 0px 0px 0px;
        opacity: 0px;

        background: #3E3E3E;
        border: 7px solid #4E4E4E;

        padding-top: 16.2vh;
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .barang {
        width: 680px;
        height: 99px;
        gap: 0px;
        border: 1px 0px 0px 0px;
        opacity: 0px;
        background: #2F2F2F;
        border: 1px solid #FFFFFF;
        margin: 0 0 4.5vh 0;
        position: relative;
    }

    .square {
        width: 25px;
        height: 25px;
        top: 38px;
        left: 27px;
        gap: 0px;
        opacity: 0px;
        background-color: transparent;
        color: white;
        border-radius: 0;
        border: 2px solid white;
        text-decoration: none;
    }

    .x-constant {
        width: 25px;
        height: 25px;
        gap: 0px;
        opacity: 0px;
        background-color: transparent;
        color: white;
        text-decoration: none;
        font-size: 100%;
    }

    .descpro {
        display: flex;
        flex-direction: column;
        margin: 1.1vh 2vw 0 0;
        padding-left: 1vw;
        color: white;
    }

    .titlepro {
        font-family: 'Inter';
        font-weight: Bold;
        font-size: 18px;
        color: white;
    }

    .singleprice {
        margin-top: 7px;
    }

    .x {
        font-family: 'La Belle Aurore';
        font-size: 20px;
        color: white;
        font-weight: 900;
        position: absolute;
        right: 11px;
        top: 11px;
    }

    .min {
        position: absolute;
        border: 1px solid white;
        width: 25px;
        height: 25px;
        top: 38px;
        left: 601px;
        display: flex;
        justify-content: center;
    }

    .plus {
        position: absolute;
        border: 1px solid white;
        width: 25px;
        height: 25px;
        top: 38px;
        left: 495px;
        display: flex;
        justify-content: center;
    }

    .qty {
        position: absolute;
        width: 25px;
        height: 25px;
        top: 38px;
        left: 547px;
        display: flex;
        justify-content: center;
        color: #FFFFFF;
    }

    .address {
        margin-top: 40vh;
    }

    .title-info {
        font-weight: bold;
        color: white;
        font-size: 20px;
        margin-bottom: 11px;
    }

    .address-info {
        width: 100%;
        height: 68px;
        border: 3px solid white;
        font-size: 12px;
        position: relative;
    }

    .address-info span {
        margin-left: 1vw;
    }

    .payment-info {
        width: 100%;
        min-height: 68px;
        border: 3px solid white;
        font-size: 12px;
        position: relative;
    }

    .payment-input-txt {
        font-family: 'Inter';
        font-style: italic;
        font-size: 18px;
        color: #FFFFFF;
        display: flex;
        flex-direction: column;
    }

    .payment-input-txt label {
        margin: 20px 0 13px 0;
    }

    .payment-input-txt input {
        background-color: transparent;
        border: none;
        border-bottom: 1px solid white;
        outline: none;
        padding-bottom: 8px;
        color: #FFFFFF;
    }

    .payment-input-txt input::placeholder {
        font-style: italic;
    }

    .payment-price {
        margin-top: 6.8vh;
    }

    .payment-price-info {
        width: 100%;
        min-height: 69px;
        border: 3px solid white;
        font-size: 12px;
        position: relative;
    }

    .payment-price-info-min {
        width: 100%;
        min-height: 48px;
        border: 3px solid white;
        font-size: 12px;
        position: relative;
    }

    .payment-price-txt-container {
        display: flex;
        justify-content: space-between;
        padding: 0 30px 0 30px;
    }

    .payment-price-info-txt {
        color: #FFFFFF;
        display: flex;
        flex-direction: column;
        font-family: 'Inter';
        font-size: 18px;
        justify-content: center;
        padding: 10px;
    }



    * {
        font-size-adjust: inherit;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<div class="row" style="min-height: 500px;">
    <div class="col-7 cartinfo">
        <div class="cartlist">
            <h1 style="color: white; font-family: 'La Belle Aurore';
                font-size: 64px;
                font-weight: 400;
                line-height: 118.56px;
                text-align: center;
                text-shadow: 4px 7px 4px rgba(0, 0, 0, 0.7);
                position:absolute;
                top:18.5vh;
                left:23.4vw;
             ">Keranjang
            </h1>
            <form name="myForm">
                <?php foreach ($keranjanganda as $kanda) : ?>
                    <div class="d-flex barang">
                        <div class="d-flex justify-content-center" style="align-items:center; width: 100px; color:white">
                            <input class="form-check-input square" type="checkbox" name="radioprice" id="checkboxNoLabel" value="<?= $kanda['ID_BARANG']; ?> <?= $kanda['TotalHarga']; ?>" checked>
                        </div>
                        <div class="card" style="margin:1.25vh; margin-left:0; width: 100px; height:80px; border-radius:0;"><img src="gambar/produk/<?= $kanda['FOTO_BARANG'] ?>" alt="produk" style="max-width: 100%; max-height: 100%; min-width: 99.9%; min-height: 99.9%;"></div>
                        <div class="descpro">
                            <span class="titlepro"><?= $kanda['NAMA_BARANG']; ?></span>
                            <span>( <?= $kanda['Berat'] / $kanda['Jumlah']; ?>g ) <?= $kanda['NAMA_KATEGORI']; ?></span>
                            <span class="singleprice"><?= "Rp. " . number_format($kanda['HARGA_BARANG'], 0, ',', '.'); ?> / pcs</span>
                        </div>
                        <a href="controller/transaksi/plus_onecartpieces.php?pro=<?= $kanda['ID_BARANG']; ?>&w=<?= $kanda['ID_UKURAN']; ?>">
                            <div class="plus"><span style="font-size: 18px;color:white;display:flex;justify-content:center;text-align:center;">+</span></div>
                        </a>
                        <div class="qty"><?= $kanda['Jumlah']; ?></div>
                        <a href="controller/transaksi/min_onecartpieces.php?pro=<?= $kanda['ID_BARANG']; ?>&w=<?= $kanda['ID_UKURAN']; ?>">
                            <div class="min"><span style="font-size: 18px;color:white;">-</span></div>
                        </a>
                        <a href="<?= BASEURL . 'controller/transaksi/hapusbarangkeranjang.php?pro=' . $kanda['ID_BARANG']; ?>" class="x">✘</a>
                    </div>
                <?php endforeach; ?>
            </form>
        </div>
    </div>
    <div class="col-4 payinfo">
        <h1 style="color: white; font-family: 'La Belle Aurore';
                font-size: 64px;
                font-weight: 400;
                line-height: 118.56px;
                text-align: center;
                text-shadow: 4px 7px 4px rgba(0, 0, 0, 0.7);
                position:absolute;
                top:18.5vh;
                left:0; right:0;
             ">Info Pembayaran
        </h1>
        <div class="address">
            <div class="title-info">Alamat pengiriman</div>
            <div class="address-info" style="display: flex; flex-direction:column; color:white; font-family:'Inter'; font-size:12px; padding: 0.80vh 0 0.80vh 0;">
                <span><?= $_SESSION['user']['NAMA_CUSTOMER']; ?> | <?= $_SESSION['user']['NOMOR_TELPON_CUSTOMER']; ?></span>
                <span><?= $_SESSION['user']['ALAMAT']; ?></span>
                <span><?= $_SESSION['user']['KOTA']; ?>, <?= $_SESSION['user']['PROVINSI']; ?></span>
                <div class="add-address" style="position: absolute; top:18px; right:20px; font-size:18px; font-family:'Inter';">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="payment-method" style="margin-top: 50px;">
            <form action="controller/transaksi/transaksi_keranjang.php" method="post">
                <div class="title-info">Metode Pembayaran</div>
                <div class="payment-info" style="display: flex; flex-direction:column; color:white; font-family:'Inter'; font-size:12px; padding: 1.5vh 0 1.5vh 0;">
                    <div class="form-check">
                        <input class="form-check-input" style="width:15px; height:15px; margin:3px 15px 0 0;" type="radio" name="namabank" id="flexRadioDefault1" value="Bank Jatim" checked>
                        <label class="form-check-label" for="flexRadioDefault1" style="margin: 3px 0 0 0;">
                            <span style="font-size: 12px; font-family:'Inter'; padding-left:10px; font-style:italic;"> Transfer Bank Jatim</span>
                        </label>
                    </div>


                    <div class="form-check">
                        <input class="form-check-input" style="width:15px; height:15px; margin:3px 15px 0 0;" type="radio" name="namabank" id="flexRadioDefault1" value="BRI">
                        <label class="form-check-label" for="flexRadioDefault1" style="margin: 3px 0 0 0;">
                            <span style="font-size: 12px; font-family:'Inter'; padding-left:10px; padding-top:4px; font-style:italic;"> Transfer BRI</span>
                        </label>
                    </div>

                </div>
                <!-- HIDDEN INPUT -->
                <input type="hidden" name="array_keranjang" id="array_keranjang" value="<?= $stringlist; ?>">
                <input type="hidden" name="harga_ongkir" id="harga_ongkir" value="<?= $cost; ?>">
                <input type="hidden" name="jumlah_keseluruhan_harga" id="jumlah_keseluruhan_harga" value="<?= $sumprice + $cost; ?>">
                <!-- /HIDDEN INPUT -->
                <div class="payment-input" id="cardpayment">
                    <div class="payment-input-txt">
                        <label for="nameoncard">Name On Card</label>
                        <input type="text" name="nameoncard" id="nameoncard" placeholder="Nama,ex : Babang Santoso" required>
                    </div>
                    <div class="payment-input-txt">
                        <label for="cardnumber">Nomor Kartu</label>
                        <input type="text" name="cardnumber" id="cardnumber" placeholder="Card Number,ex : 0000 0000 0000 000" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="payment-input-txt">
                            <label for="experied">Exp</label>
                            <div class="experied d-flex">
                                <input type="text" name="MM" id="MM" placeholder="MM, ex : 10" style="width: 108px;" required>
                                <input type="text" name="YY" id="YY" placeholder="YY, ex : 24" style="width: 108px; margin-left:30px;" required>
                            </div>
                        </div>
                        <div class="payment-input-txt">
                            <label for="cvv">CVV</label>
                            <div class="cvv">
                                <input type="text" name="cvv" id="MM" placeholder="123" style="width: 108px;" required>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="payment-price">
            <div class="payment-price-info">
                <div class="payment-price-txt-container">
                    <div class="payment-price-info-txt">
                        <span>Total ( <?= $jumlah_produk; ?> Produk )</span>
                        <span>Biaya Pengiriman</span>
                    </div>
                    <div class="payment-price-info-txt">
                        <span id="total_harga_produk"><?= "Rp " . number_format($sumprice, 0, ',', '.'); ?>,00</span>
                        <span><?= "Rp " . number_format($cost, 0, ',', '.'); ?>,00</span>
                    </div>
                </div>
            </div>
            <div class="payment-price-info-min" style="margin: 4vh 0 4vh 0;">
                <div class="payment-price-txt-container">
                    <div class=" payment-price-info-txt">
                        <span>Total Pembayaran</span>
                    </div>
                    <div class="payment-price-info-txt">
                        <span id="total_harga_pembelian"><?= "Rp " . number_format($sumprice + $cost, 0, ',', '.'); ?>,00</span>
                    </div>
                </div>
            </div>
            <div class="payment-price-info-min" style="margin: 0 0 7vh 0; padding:0;">
                <div class="payment-price-info-txt" style="margin: 0;">
                    <!-- <span class="d-flex justify-content-center" id="ini">
                        Bayar
                    </span> -->
                    <input type="submit" value="Bayar" class="d-flex justify-content-center" style="background-color: transparent; text-decoration:none; border:none; outline:none; color:white; margin:0;">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<?php include("templates/footer.php") ?>


<script>
    let myForm = document.myForm;
    for (var i = 0; i < myForm.length; i++) {
        if (myForm[i].type === 'checkbox') {
            myForm[i].addEventListener('change', function() {
                updatePrix();
            });
        }
    }

    function updatePrix() {
        let list_produk = [];
        let harga = 0;
        let total_harga_produk = document.getElementById("total_harga_produk");
        let total_harga_pembelian = document.getElementById("total_harga_pembelian");
        let ini = document.getElementById("ini");

        for (var i = 0; i < myForm.length; i++) {
            if (myForm[i].type === 'checkbox' && myForm[i].checked) {
                array_value = myForm[i].value;
                let arrayNilai = array_value.split(" ");
                list_produk.push(parseInt(arrayNilai[0]));
                harga += parseInt(arrayNilai[1])
            }
        }
        total_harga_produk.innerHTML = harga.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });

        <?php echo "let cost = " . $cost . ";"; ?>
        total_harga = harga + cost;
        total_harga_pembelian.innerHTML = total_harga.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });

        let data_post = {
            "total_produk": harga,
            "list_produk": list_produk,
            "ongkir": cost,
            "total_pembelian": total_harga
        };
        let BOngkir = document.getElementById("harga_ongkir");
        let THarga = document.getElementById("jumlah_keseluruhan_harga");
        let LProduk = document.getElementById("array_keranjang");
        BOngkir.value = cost;
        THarga.value = total_harga;
        LProduk.value = list_produk;
    }
</script>