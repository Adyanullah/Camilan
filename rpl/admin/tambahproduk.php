<?php
require_once('../Database/base.php');
require_once('../Database/database.php');


$kategori = getDataAll('kategori');
?>


<style>
    .font-form {
        color: #000;
        font-family: Inter;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        display: flex;
        width: 167px;
        height: 26px;
        flex-direction: column;
        justify-content: center;
        flex-shrink: 0;
    }

    .input-form {
        border: 1px solid #C3C3C3;
        border-radius: 3px;
        background: #C3C3C3;
        width: 100%;
        height: 50px;
        flex-shrink: 0;
        margin-bottom: 3.7vh;
    }

    .button-submit-form {
        border: #3604FD;
        border-radius: 15px;
        background: #3604FD;
        width: 100px;
        height: 50px;
        flex-shrink: 0;
        color: #FFF;
        text-align: center;
        font-family: Inter;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-decoration-line: underline;
    }

    input[type="file"]::file-selector-button {
        height: 100%;
        cursor: pointer;
        border: 0px solid #8C8C8C;
        margin-right: 1vw;
        border-radius: 3px 0px 0px 3px;
        background: #8C8C8C;
        transition: background-color 200ms;
    }

    /* file upload button hover state */
    input[type="file"]::file-selector-button:hover {
        background-color: #f3f4f6;
    }

    /* file upload button active state */
    input[type="file"]::file-selector-button:active {
        background-color: #e5e7eb;
    }
</style>

<?php include("../templates/header-admin.php") ?>

<form action="<?= BASEURL . 'admin/eksekusiperintah/tambahbarang.php' ?>" method="post" enctype="multipart/form-data" style="width: 70%; color:black;" class="mb-5 pb-5">
    <div class="mb-1">
        <label class="font-form" for="namaproduk">Nama Produk</label>
        <input type="text" class="input-form px-3" id="formGroupExampleInput" placeholder="Nama Product" name="namaproduk" required>
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
        <input type="text" class="input-form px-3" id="formGroupExampleInput2" placeholder="Tambah Deskripsi" name="deskripsi" required>
    </div>
    <div class="d-flex justify-content-center">
        <button type="reset" class="button-submit-form mx-5" style="background-color: red;">Cancel </button>
        <button type="submit" class="button-submit-form mx-5"> Submit </button>
    </div>
</form>

<?php include("../templates/footer-admin.php") ?>