<?php $title = "Tambah Produk"; ?>
<?php
require_once('../Database/base.php');
require_once('../Database/database.php');


$kategori = getDataAll('kategori');
$weight = getDataAll('ukuran_barang');
?>

<?php include("../templates/header-admin.php") ?>

<form name="myForm" action="<?= BASEURL . 'controller/admin/tambahbarang.php' ?>" method="post" enctype="multipart/form-data" style="width: 70%; color:black;" class="mb-5 pb-5">
    <div class="mb-1">
        <label class="font-form" for="namaproduk">Nama Produk</label>
        <input type="text" class="input-form px-3" id="formGroupExampleInput" placeholder="Nama Product" name="namaproduk" required>
    </div>
    <div class="mb-1">
        <label class="font-form" for="InputFoto" class="form-label">Foto Produk</label>
        <input class="input-form p-0" type="file" id="InputFoto" name="fotoproduk" required>
    </div>
    <div class="mb-1">
        <label class="font-form" for="hargaproduk">Harga</label>
        <input type="text" class="input-form px-3" id="formGroupExampleInput2" placeholder="10000" name="hargaproduk" required>
    </div>
    <div class="mb-1">
        <label class="font-form" for="stockproduk">Stock</label>
        <input type="text" class="input-form px-3" id="formGroupExampleInput2" placeholder="99" name="stockproduk" required>
    </div>
    <div class="mb-1">
        <label class="font-form" for="deskripsi">Deskripsi</label>
        <textarea style="padding-top: 1.2%;" class="input-form px-3" id="formGroupExampleInput2" placeholder="Tambah Deskripsi" name="deskripsi" required></textarea>
    </div>
    <div class="mb-1">
        <label class="font-form mb-2" for="WeightForm">Varian Rasa</label>
        <div class="d-flex align-items-center" id="WeightForm">
            <?php foreach ($kategori as $kat) : ?>
                <div class="form-check">
                    <input class="form-checkbox-varian" type="checkbox" value="<?= $kat['ID_KATEGORI'] ?>" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <?= $kat['NAMA_KATEGORI'] ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="mb-5">
        <label class="font-form mb-2" for="WeightForm">Ukuran yang tersedia</label>
        <div class="d-flex align-items-center" id="WeightForm">
            <?php foreach ($weight as $w) : ?>
                <div class="form-check">
                    <input class="form-checkbox-berat" type="checkbox" value="<?= $w['ID_UKURAN'] ?>" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <?= $w['BERAT'] ?>g
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <input type="hidden" name="varian" id="array_varian">
    <input type="hidden" name="berat" id="array_berat">
    <div class="d-flex justify-content-center">
        <button type="reset" class="button-submit-form mx-5" style="background-color: red;">Cancel </button>
        <button type="submit" class="button-submit-form mx-5"> Submit </button>
    </div>
</form>

<?php include("../templates/footer-admin.php") ?>
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
        let list_ukuran = [];
        let list_var = [];

        for (var i = 0; i < myForm.length; i++) {
            if (myForm[i].type === 'checkbox' && myForm[i].checked && myForm[i].classList.contains("form-checkbox-berat")) {
                array_value = myForm[i].value;
                list_ukuran.push(parseInt(array_value));
            } else if (myForm[i].type === 'checkbox' && myForm[i].checked && myForm[i].classList.contains("form-checkbox-varian")) {
                array_value2 = myForm[i].value;
                list_var.push(parseInt(array_value2));
            }
        }

        let LSize = document.getElementById("array_berat");
        let LVar = document.getElementById("array_varian");
        LSize.value = list_ukuran;
        LVar.value = list_var;
    }
</script>