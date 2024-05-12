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




<?php include '../templates/footer.php' ?>