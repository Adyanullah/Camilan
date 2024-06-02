<?php $title = "Edit Produk"; ?>
<?php
require_once('../Database/base.php');
require_once('../Database/database.php');


$kategori = getDataAll('kategori');
$produk = getDataAllWhere('barang', 'ID_BARANG', $_GET['product']);
$weight_array_string = $produk[0]['Ukuran'];
$weight = getDataAll('ukuran_barang');
?>

<?php include("../templates/header-admin.php") ?>

<form name="EditForm" action="<?= BASEURL . '/controller/admin/edit_produk.php' ?>" method="post" enctype="multipart/form-data" style="width: 70%; color:black;" class="mb-5 pb-5">
    <div class="mb-1">
        <label class="font-form" for="namaproduk">Nama Produk</label>
        <input type="text" class="input-form px-3" id="formGroupExampleInput" placeholder="Nama Product" name="namaproduk" value="<?= $produk[0]['NAMA_BARANG'] ?>" required>
    </div>
    <div class="mb-1">
        <label class="font-form" for="kategori">Kategori Produk</label>
        <select class="input-form px-3" aria-label="Default select example" name="kategori" required>
            <option selected>Select Category</option>
            <?php foreach ($kategori as $kat) : ?>
                <option value="<?= $kat['ID_KATEGORI']; ?>"><?= $kat['NAMA_KATEGORI']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-1">
        <label class="font-form" for="InputFoto" class="form-label">Foto Produk</label>
        <input class="input-form p-0" type="file" id="InputFoto" name="fotoproduk" value="<?= $produk[0]['FOTO_BARANG'] ?>" required>
    </div>
    <div class="mb-1">
        <label class="font-form" for="hargaproduk">Harga</label>
        <input type="text" class="input-form px-3" id="formGroupExampleInput2" placeholder="10000" name="hargaproduk" value="<?= $produk[0]['HARGA_BARANG'] ?>" required>
    </div>
    <div class="mb-1">
        <label class="font-form" for="stockproduk">Stock</label>
        <input type="text" class="input-form px-3" id="formGroupExampleInput2" placeholder="99" name="stockproduk" value="<?= $produk[0]['STOCK'] ?>" required>
    </div>
    <div class="mb-1">
        <label class="font-form" for="deskripsi">Deskripsi</label>
        <textarea style="padding-top: 1.2%;" class="input-form px-3" id="formGroupExampleInput2" placeholder="Tambah Deskripsi" name="deskripsi" required><?= $produk[0]['Deskripsi'] ?></textarea>
    </div>
    <div class="mb-5">
        <label class="font-form mb-2" for="WeightForm">Ukuran yang tersedia</label>
        <div class="d-flex align-items-center" id="WeightForm">
            <?php
            foreach ($weight as $w) :
                $weight_array = explode(',', $weight_array_string);
                if (in_array($w['ID_UKURAN'], $weight_array)) :
            ?>
                    <div class="form-check">
                        <input class="" type="checkbox" value="<?= $w['ID_UKURAN'] ?>" id="flexCheckDefault" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                            <?= $w['BERAT'] ?>g
                        </label>
                    </div>
                <?php else : ?>
                    <div class="form-check">
                        <input class="" type="checkbox" value="<?= $w['ID_UKURAN'] ?>" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?= $w['BERAT'] ?>g
                        </label>
                    </div>
            <?php
                endif;
            endforeach;
            ?>
        </div>
    </div>
    <input type="hidden" name="berat" id="array_berat" value="<?= $weight_array_string; ?>">
    <input type="hidden" name="idbarang" value="<?= $produk[0]['ID_BARANG']; ?>">
    <div class="d-flex justify-content-center">
        <button type="reset" class="button-submit-form mx-5" style="background-color: red;">Cancel </button>
        <button type="submit" class="button-submit-form mx-5"> Submit </button>
    </div>
</form>

<?php include("../templates/footer-admin.php") ?>
<script>
    let myForm = document.EditForm;
    for (var i = 0; i < myForm.length; i++) {
        if (myForm[i].type === 'checkbox') {
            myForm[i].addEventListener('change', function() {
                updatePrix();
            });
        }
    }

    function updatePrix() {
        let list_ukuran = [];

        for (var i = 0; i < myForm.length; i++) {
            if (myForm[i].type === 'checkbox' && myForm[i].checked) {
                array_value = myForm[i].value;
                list_ukuran.push(parseInt(array_value));
            }
        }

        let LSize = document.getElementById("array_berat");
        LSize.value = list_ukuran;
    }
</script>