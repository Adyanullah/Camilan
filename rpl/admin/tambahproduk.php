<?php
require_once('../Database/base.php');
require_once('../Database/database.php');


$kategori = getDataAll('kategori');
?>


<style>
    form div input {
        margin-bottom: 2vh;
    }
</style>

<?php
include("../templates/navbar.php")
?>

<div class="form-product-container" style="margin-top:9vh;">
    <h3 style="color: white; text-align:center;">Tambah Produk</h3>
    <form action="<?= BASEURL . 'admin/eksekusiperintah/tambahbarang.php' ?>" method="post" enctype="multipart/form-data" style="width: 40vw; color:white;">
        <!-- <div class="form-group">
            <label for="formGroupExampleInput">ID Produk</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="idproduk">
        </div> -->
        <div class="form-group">
            <label for="formGroupExampleInput">Nama Produk</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="namaproduk">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Kategori Produk</label>
            <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="kategori">
                <option selected>Open this select menu</option>
                <?php foreach ($kategori as $kat) : ?>
                    <option value="<?= $kat['ID_KATEGORI']; ?>"><?= $kat['NAMA_KATEGORI']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Foto Produk</label>
            <input class="form-control" type="file" id="formFile" name="fotoproduk">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Harga</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input" name="hargaproduk">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Stock</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input" name="stockproduk">
        </div>
        <div class="d" style="display:flex; justify-content:space-between; margin-top:5vh; margin-bottom:5vh;">
            <a href="#">Batal / Kembali </a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<?php include("../templates/footer.php") ?>