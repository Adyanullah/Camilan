<?php
// AMBIL KOTA ONGKIR DARI RAJAONGKIR API------------------------

require_once "../controller/function/ongkir.php";
$data = new rajaongkir();

$kota = $data->get_city();
$kota = json_decode($kota, true);
$kota = $kota['rajaongkir']['results'];

$data_2 = new rajaongkir();

$provinsi = $data_2->get_prov();
$provinsi = json_decode($provinsi, true);
$provinsi = $provinsi['rajaongkir']['results'];
?>
<style>
    .full-page {
        background-color: rgba(0, 0, 0, 0.2);
        width: 100vw;
        height: 100vh;
        position: fixed;
        bottom: 0px;
        /* Adjust as needed */
        right: 0px;
        left: 0px;
        /* Adjust as needed */
        padding: 20px;
        /* Hide by default */
        z-index: 99999;
        /* Ensure it's above other content */

    }
</style>
<div class="full-page d-flex justify-content-center align-items-center">
    <div style="width: 430px; height: 633px; position: relative; background: #DFDEDE; border-radius: 10px; overflow: hidden" class="d-flex flex-column align-items-center">
        <div class="pt-4 ps-4 mb-3" style="width: 100%; height: 59px;"><span class="text-start" style="color: black; font-size: 30px; font-family: Inter; font-weight: 400; word-wrap: break-word">Edit Address</span></div>
        <form action="<?= BASEURL . 'controller/function/edit_address.php'; ?>" method="post">
            <div style="width: 391px; height: 436px; flex-shrink: 0; border-radius: 10px; border: 0.5px solid #999595; background: rgba(124, 122, 122, 0.10);">
                <div class="col-12 d-flex flex-column mb-3 px-3 mt-3">
                    <label for="alamat">Provinsi : <span class="text-danger">*</span></label>
                    <select style="background-color: transparent; border:none;" name="provinsi" id="" required>
                        <option selected>Pilih Provinsi</option>
                        <?php foreach ($provinsi as $prov) : ?>
                            <option value="<?= $prov['province_id']; ?>"><?= $prov['province']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-12 d-flex flex-column mb-3 px-3">
                    <label for="alamat">Kabupaten : <span class="text-danger">*</span></label>
                    <select style="background-color: transparent; border:none;" name="kabupaten" id="" required>
                        <option selected>Pilih Kabupaten</option>
                        <?php foreach ($kota as $cities) : ?>
                            <option value="<?= $cities['city_id']; ?>"><?= $cities['city_name']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-12 d-flex flex-column mb-3 px-3">
                    <label for="alamat">Detail Lainnya : <span class="text-danger">*</span></label>
                    <input type="text-area" style="background-color: transparent; border:none;" name="alamat" id="" placeholder="Desa, Jalan, No., Gedung, Etc." required>
                    <div style="width:100%; height: 0px; border: 1px black solid"></div>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center" style="width: 100%;">
                <button type="submit" style="width: 283px;height: 46px;flex-shrink: 0;border-radius: 10px;background: #7D7B7B;" class="mt-3 d-flex justify-content-center align-items-center">
                    <div class="text-light fw-bold text-center fs-5">SAVE</div>
                </button>
            </div>
            <div style="height: 46px;flex-shrink: 0;" class="mt-1 d-flex justify-content-center align-items-center">
                <a href="<?= BASEURL . 'profile'; ?>" class="profile-underline-sidelink" style="color: black;">Cancel</a>
            </div>
        </form>
    </div>
</div>