<?php
require_once('Database/base.php');
require_once('Database/database.php');

if (!isset($_SESSION['user'])) {
    header('location: login.php');
    exit();
}

$keranjanganda = getListKeranjang($_SESSION['user']);
$sumprice = 0;

foreach ($keranjanganda as $price) {
    $sumprice = $sumprice + $price['TotalHarga'];
}

// AMBIL HARGA ONGKIR DARI RAJAONGKIR API------------------------

require_once "controller/function/ongkir.php";
$data = new rajaongkir();

$kota = $data->get_city();
$kota = json_decode($kota, true);
$kota = $kota['rajaongkir']['results'];

$kota_asal = 31;
$kota_tujuan = 31;
$berat = 100;

$harga_ongkir = json_decode($data->get_cost($kota_asal, $kota_tujuan, $berat, 'jne'), true);
$cost = $harga_ongkir["rajaongkir"]["results"][0]["costs"][0]["cost"][0]["value"];
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
                            <!-- <input class="form-check-input square" type="checkbox" name="radioprice" id="checkboxNoLabel" value="<?= $kanda['TotalHarga']; ?>" aria-label="..."> -->
                            <div class="x-constant">✘</div>
                        </div>
                        <div class="card" style="margin:1.25vh; margin-left:0; width: 100px; height:80px; border-radius:0;"><img src="gambar/produk/<?= $kanda['FOTO_BARANG'] ?>" alt="produk" style="max-width: 100%; max-height: 100%;"></div>
                        <div class="descpro">
                            <span class="titlepro"><?= $kanda['NAMA_BARANG']; ?></span>
                            <span>( 100 g ) Pedas</span>
                            <span class="singleprice"><?= "Rp. " . number_format($kanda['HARGA_BARANG'], 0, ',', '.'); ?> / pcs</span>
                        </div>
                        <div class="plus"><span style="font-size: 18px;color:white;display:flex;justify-content:center;text-align:center;">+</span></div>
                        <div class="qty"><?= $kanda['Jumlah']; ?></div>
                        <div class="min">
                            <p style="font-size: 18px;color:white;">-</p>
                        </div>
                        <!-- <div class="x">✘</div> -->
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
                <span>Ahmad Ar-rosyid H. | (+62) 081321801881</span>
                <span>Kos Novi, Gg. 06, Telang, Kamal</span>
                <span>Kamal, Bangkalan, Jawa Timur</span>
                <div class="add-address" style="position: absolute; top:18px; right:20px; font-size:18px; font-family:'Inter';">►</div>
            </div>
        </div>
        <div class="payment-method" style="margin-top: 50px;">
            <div class="title-info">Metode Pembayaran</div>
            <div class="payment-info" style="display: flex; flex-direction:column; color:white; font-family:'Inter'; font-size:12px; padding: 1.5vh 0 1.5vh 0;">
                <div class="form-check">
                    <input class="form-check-input" style="width:15px; height:15px; margin:3px 15px 0 0;" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1" style="margin: 3px 0 0 0;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
                            <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                        </svg>
                        <span style="font-size: 12px; font-family:'Inter'; padding-left:10px; font-style:italic;"> Credit Card</span>
                    </label>
                </div>


                <div class="form-check">
                    <input class="form-check-input" style="width:15px; height:15px; margin:3px 15px 0 0;" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1" style="margin: 3px 0 0 0;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16">
                            <path d="M2 2h2v2H2z" />
                            <path d="M6 0v6H0V0zM5 1H1v4h4zM4 12H2v2h2z" />
                            <path d="M6 10v6H0v-6zm-5 1v4h4v-4zm11-9h2v2h-2z" />
                            <path d="M10 0v6h6V0zm5 1v4h-4V1zM8 1V0h1v2H8v2H7V1zm0 5V4h1v2zM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8zm0 0v1H2V8H1v1H0V7h3v1zm10 1h-1V7h1zm-1 0h-1v2h2v-1h-1zm-4 0h2v1h-1v1h-1zm2 3v-1h-1v1h-1v1H9v1h3v-2zm0 0h3v1h-2v1h-1zm-4-1v1h1v-2H7v1z" />
                            <path d="M7 12h1v3h4v1H7zm9 2v2h-3v-1h2v-1z" />
                        </svg>
                        <span style="font-size: 12px; font-family:'Inter'; padding-left:10px; padding-top:4px; font-style:italic;"> QRIS</span>
                    </label>
                </div>

            </div>
            <div class="payment-input">
                <div class="payment-input-txt">
                    <label for="nameoncard">Name On Card</label>
                    <input type="text" name="nameoncard" id="nameoncard" placeholder="Nama,ex : Babang Santoso">
                </div>
                <div class="payment-input-txt">
                    <label for="cardnumber">Nomor Kartu</label>
                    <input type="text" name="cardnumber" id="cardnumber" placeholder="Card Number,ex : 0000 0000 0000 000">
                </div>
                <div class="d-flex justify-content-between">
                    <div class="payment-input-txt">
                        <label for="experied">Exp</label>
                        <div class="experied d-flex">
                            <input type="text" name="MM" id="MM" placeholder="MM, ex : 10" style="width: 108px;">
                            <input type="text" name="YY" id="YY" placeholder="YY, ex : 24" style="width: 108px; margin-left:30px;">
                        </div>
                    </div>
                    <div class="payment-input-txt">
                        <label for="cvv">CVV</label>
                        <div class="cvv">
                            <input type="text" name="cvv" id="MM" placeholder="123" style="width: 108px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="payment-price">
            <div class="payment-price-info">
                <div class="payment-price-txt-container">
                    <div class="payment-price-info-txt">
                        <span>Total ( 5 Produk )</span>
                        <span>Biaya Pengiriman</span>
                    </div>
                    <div class="payment-price-info-txt">
                        <span><?= "Rp. " . number_format($sumprice, 0, ',', '.'); ?></span>
                        <span><?= "Rp. " . number_format($cost, 0, ',', '.'); ?></span>
                    </div>
                </div>
            </div>

            <?php $sumprice_final = $sumprice + $cost; ?>

            <div class="payment-price-info-min" style="margin: 4vh 0 4vh 0;">
                <div class="payment-price-txt-container">
                    <div class=" payment-price-info-txt">
                        <span>Total Pembayaran</span>
                    </div>
                    <div class="payment-price-info-txt">
                        <span><?= "Rp. " . number_format($sumprice_final, 0, ',', '.'); ?></span>
                    </div>
                </div>
            </div>
            <div class="payment-price-info-min" style="margin: 0 0 7vh 0;">
                <div class="payment-price-info-txt">
                    <span class="d-flex justify-content-center">Bayar</span>
                </div>
            </div>
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
        let somme = 0;
        let montant_commande = document.getElementById('montant_commande');
        let adaYangDicentang = false;

        for (var i = 0; i < myForm.length; i++) {
            if (myForm[i].type === 'checkbox' && myForm[i].checked) {
                adaYangDicentang = true;
                somme += parseInt(myForm[i].value, 10);
            }
        }

        if (adaYangDicentang) {
            montant_commande.value = " Rp. " + somme.toLocaleString('id-ID');
        } else {
            montant_commande.value = " Rp. " + '0'.toLocaleString('id-ID');;
        }

    }
</script>