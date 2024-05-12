<?php
//ambil data spesifik dari suatu tabel berdasarkan id
function getData($data, $table, $id)
{
    try {
        if ($data == 'all') {
            $statement = DB->prepare("SELECT * FROM $table where ID_" . strtoupper($table) . "= :id");
        } else {
            $statement = DB->prepare("SELECT $data FROM $table where ID_" . strtoupper($table) . "= :id");
        }
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function getDataAll($table)
{
    try {
        $statement = DB->prepare("SELECT * FROM $table ");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
//Pesanan
function getDataPesanan($data, $id)
{
    try {
        $statement = DB->prepare("SELECT $data FROM PESANAN where ID_ORDER = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
//Pesanan DETAIL
function getDataPesananDetail($data, $id)
{
    try {
        $statement = DB->prepare("SELECT $data FROM DETAIL_PESANAN where ID_ORDER_DETAIL = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}



// -------------------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------                   AKUN           -----------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------


function regist($post)
{
    try {
        $statement = DB->prepare("INSERT INTO customer (`NAMA_CUSTOMER`, `NOMOR_TELPON_CUSTOMER`, `USERNAME`, `PASSWORD`, `EMAIL`, `ALAMAT`) VALUES (:nama, :nomor, :user, :pass, :email, :alamat)");
        // $statement->bindValue(':id', htmlspecialchars($post['id']));
        $statement->bindValue(':nama', $post['fullname']);
        $statement->bindValue(':nomor', htmlspecialchars($post['notelp']));
        $statement->bindValue(':user', $post['username']);
        $statement->bindValue(':pass', htmlspecialchars($post['password']));
        $statement->bindValue(':email', $post['email']);
        $statement->bindValue(':alamat', $post['alamat']);
        $statement->execute();
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}

// -------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------- K E L O L A    P R O D U K -----------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------


function addProduct($post)
{
    try {
        $img = $post[1]['fotoproduk']['name'];
        $tmp = $post[1]['fotoproduk']['tmp_name'];
        $dir = "../../gambar/produk/";
        $new = time() . $img;
        move_uploaded_file($tmp, $dir . $new);

        $supplier = '1010';

        $statement = DB->prepare("INSERT INTO barang (`ID_KATEGORI`, `ID_SUPPLIER`, `NAMA_BARANG`, `HARGA_BARANG`, `STOCK`, `FOTO_BARANG`) VALUES (:kategori, :supplier, :nama, :harga, :stock, :foto)");
        $statement->bindValue(':kategori', $post[0]['kategori']);
        $statement->bindValue(':supplier', $supplier);
        $statement->bindValue(':nama', $post[0]['namaproduk']);
        $statement->bindValue(':harga', $post[0]['hargaproduk']);
        $statement->bindValue(':stock', $post[0]['stockproduk']);
        $statement->bindValue(':foto', $new);
        $statement->execute();
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}

function deletebarangdikeranjang($id)
{
    try {
        $statement = DB->prepare("DELETE FROM keranjang WHERE ID_KERANJANG = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
    } catch (PDOException $err) {
        echo "Hapus data gagal";
        echo $err->getMessage();
    }
}

function deletebarang($id)
{
    try {
        $statement = DB->prepare("DELETE FROM barang WHERE ID_BARANG = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
    } catch (PDOException $err) {
        echo "Hapus data gagal";
        echo $err->getMessage();
    }
}



// -------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------- K E L O L A    K E R A N J A N G -----------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------


function insertcart($id, $ip)
{
    try {


        $st = DB->prepare("UPDATE barang SET STOCK = STOCK-1 WHERE ID_BARANG = :id");
        $st->bindValue(':id', $id);
        $st->execute();

        $statement = DB->prepare("INSERT INTO keranjang(ID_BARANG, ID_CUSTOMER) VALUES(:idProduk, :idCust)");

        $statement->bindValue(':idProduk', $id);
        $statement->bindValue(':idCust', $ip);
        $statement->execute();

        $previousPage = $_SERVER['HTTP_REFERER'];
        header("Location: $previousPage");
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}


//Ambildata
function getListKeranjang($id)
{
    try {
        // $statement = DB->prepare("SELECT *
        // FROM keranjang
        // INNER JOIN barang ON keranjang.ID_BARANG = barang.ID_BARANG WHERE keranjang.ID_CUSTOMER = :id;
        // ");
        // $statement->bindValue(':id', $id);
        // $statement->execute();
        // return $statement->fetchAll(PDO::FETCH_ASSOC);

        $statement = DB->prepare("SELECT barang.ID_BARANG, barang.ID_KATEGORI, barang.NAMA_BARANG, barang.HARGA_BARANG, barang.STOCK, barang.FOTO_BARANG, keranjang.ID_KERANJANG, COUNT(barang.ID_BARANG) AS Jumlah, barang.HARGA_BARANG * COUNT(barang.ID_BARANG) AS TotalHarga
        FROM keranjang
        INNER JOIN barang ON keranjang.ID_BARANG = barang.ID_BARANG WHERE keranjang.ID_CUSTOMER = :id
        GROUP BY barang.ID_BARANG
    ");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
