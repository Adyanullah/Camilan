<?php
require_once('../Database/base.php');
require_once('../Database/database.php');
?>

<?php
require_once '../function/ongkir.php';
$data = new rajaongkir();

$kota = $data->get_city();
$kota_array = json_decode($kota, true);

?>

<?php include '../templates/navbar.php' ?>


<form action="">
    <div class="form-group">
        <label for="formGroupExampleInput">Kategori Produk</label>
        <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="kota_asal">
            <option selected>Open this select menu</option>
            <?php foreach ($kota_array['rajaongkir']['results'] as $city) : ?>
                <option value="<?= $city['city_id']; ?>"><?= $city['city_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="text" name="kota_tujuan">
    <input type="text" name="berat">
</form>

<?php include '../templates/footer.php' ?>