<?php
// -------------------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------- U N I V E R S A L F U N C T I O N -----------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------
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
function getDataAllLimit($table, $start, $perpage)
{
    try {
        $statement = DB->prepare("SELECT * FROM $table LIMIT $start, $perpage");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function getDataAllLIKE($table, $column, $str_array)
{
    try {
        $statement = DB->prepare("SELECT * FROM $table WHERE $column LIKE '%" . $str_array . "%'");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function getDataAllLIKELimit($table, $column, $str_array,  $start, $perpage)
{
    try {
        $statement = DB->prepare("SELECT * FROM $table WHERE $column LIKE '%" . $str_array . "%' LIMIT $start, $perpage");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function getDataAllFindInSet($table, $column, $str_array)
{
    try {
        $statement = DB->prepare("SELECT * FROM $table WHERE FIND_IN_SET('" . $str_array . "', $column) > 0");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function getDataAllWhere($table, $column, $id)
{
    try {
        $statement = DB->prepare("SELECT * FROM $table WHERE $column = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function getDataAllWhereLimit($table, $column, $id, $start, $perpage)
{
    try {
        $statement = DB->prepare("SELECT * FROM $table WHERE $column = :id LIMIT $start, $perpage");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function getDataAllWhereIN($table, $column, $str_array)
{
    try {
        $statement = DB->prepare("SELECT * FROM $table WHERE $column IN (" . $str_array . ")");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function getDataAllJoin($table, $column, $columnid)
{
    try {
        $statement = DB->prepare("SELECT * FROM $table JOIN $column ON $table.$columnid = $column.$columnid");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function getDataAllJoinWhere($table, $column, $columnid, $columnWhere, $WhereId)
{
    try {
        $statement = DB->prepare("SELECT * FROM $table JOIN $column ON $table.$columnid = $column.$columnid WHERE $columnWhere = :id");
        $statement->bindValue(':id', $WhereId);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function getDataAll2JoinWhere($table, $column, $columnid, $column_2, $columnid_2, $columnWhere, $WhereId)
{
    try {
        $statement = DB->prepare("SELECT * FROM $table JOIN $column ON $table.$columnid = $column.$columnid JOIN $column_2 ON $table.$columnid_2 = $column_2.$columnid_2 WHERE $columnWhere = :id");
        $statement->bindValue(':id', $WhereId);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function getDataAllJoinLimit($table, $column, $columnid, $start, $perpage)
{
    try {
        $statement = DB->prepare("SELECT * FROM $table JOIN $column ON $table.$columnid = $column.$columnid LIMIT $start, $perpage");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function getDataAllWhere2($table, $column, $id, $AND_OR, $column2, $id2)
{
    try {
        if ($AND_OR == 'OR') :
            $statement = DB->prepare("SELECT * FROM $table WHERE $column = :id OR $column2 = :id2");
        else :
            $statement = DB->prepare("SELECT * FROM $table WHERE $column = :id AND $column2 = :id2");
        endif;
        $statement->bindValue(':id', $id);
        $statement->bindValue(':id2', $id2);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function getDataAllWhere2JOIN($table, $column, $id, $AND_OR, $column2, $id2, $tablejoin, $tablejoincolumn)
{
    try {
        if ($AND_OR == 'OR') :
            $statement = DB->prepare("SELECT * FROM $table JOIN $tablejoin ON $tablejoin.$tablejoincolumn = $table.$tablejoincolumn WHERE $column = :id OR $column2 = :id2");
        else :
            $statement = DB->prepare("SELECT * FROM $table JOIN $tablejoin ON $tablejoin.$tablejoincolumn = $table.$tablejoincolumn WHERE $column = :id AND $column2 = :id2");
        endif;
        $statement->bindValue(':id', $id);
        $statement->bindValue(':id2', $id2);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}

function updatevalue($table, $column, $change, $column_condition, $id)
{
    try {
        $builder = DB->prepare("UPDATE $table SET $column = :change WHERE $column_condition = :id");
        $builder->bindValue(':change', $change);
        $builder->bindValue(':id', $id);
        $builder->execute();
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}

// -------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------- K E L O L A    P E S A N A N ---------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------

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
function DataOrderDetailTransaction($IDORDER)
{
    try {
        $builder = DB->prepare("SELECT *
        FROM detail_pesanan d 
        JOIN barang b ON d.ID_BARANG = b.ID_BARANG 
        JOIN kategori ON d.ID_KATEGORI = kategori.ID_KATEGORI
        WHERE d.ID_ORDER = $IDORDER");
        $builder->execute();
        return $builder->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}



// -------------------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------                   AKUN           -----------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------


function regist($post, $kota, $provinsi)
{
    try {
        $statement = DB->prepare("INSERT INTO customer (`NAMA_CUSTOMER`, `NOMOR_TELPON_CUSTOMER`, `USERNAME`, `PASSWORD`, `EMAIL`, `ALAMAT`, `KOTA`, `ID_KOTA`, `PROVINSI`, `ID_PROVINSI`) 
        VALUES (:nama, :nomor, :user, :pass, :email, :alamat, :kota, :id_kota, :provinsi, :id_provinsi)");
        // $statement->bindValue(':id', htmlspecialchars($post['id']));
        $statement->bindValue(':nama', $post['fullname']);
        $statement->bindValue(':nomor', htmlspecialchars($post['notelp']));
        $statement->bindValue(':user', $post['username']);
        $statement->bindValue(':pass', htmlspecialchars($post['password']));
        $statement->bindValue(':email', $post['email']);
        $statement->bindValue(':alamat', $post['alamat']);
        $statement->bindValue(':id_kota', $post['kabupaten']);
        $statement->bindValue(':id_provinsi', $post['provinsi']);
        $statement->bindValue(':kota', $kota);
        $statement->bindValue(':provinsi', $provinsi);
        $statement->execute();
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}

function edit_akun($fullname, $username, $phone, $email, $user_id)
{
    try {
        $account = DB->prepare("UPDATE `customer` SET `NAMA_CUSTOMER`=:fullname,`NOMOR_TELPON_CUSTOMER`=:phone,`USERNAME`=:username,`EMAIL`=:email WHERE ID_CUSTOMER = $user_id");
        $account->bindValue(':fullname', $fullname);
        $account->bindValue(':phone', $phone);
        $account->bindValue(':username', $username);
        $account->bindValue(':email', $email);
        $account->execute();
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function UpdateAlamat($post, $kota, $provinsi, $user_id)
{
    $update_address = DB->prepare("UPDATE `customer` SET `ALAMAT`=:alamat,`KOTA`=:kota,`ID_KOTA`=:id_kota,`PROVINSI`=:provinsi,`ID_PROVINSI`=:id_provinsi WHERE `ID_CUSTOMER` = :id");
    $update_address->bindValue(':alamat', $post['alamat']);
    $update_address->bindValue(':id_kota', $post['kabupaten']);
    $update_address->bindValue(':id_provinsi', $post['provinsi']);
    $update_address->bindValue(':kota', $kota);
    $update_address->bindValue(':provinsi', $provinsi);
    $update_address->bindValue(':id', $user_id);
    $update_address->execute();
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

        $statement = DB->prepare("INSERT INTO barang (`NAMA_BARANG`, `HARGA_BARANG`, `STOCK`, `FOTO_BARANG`, `Deskripsi`, `Ukuran`, `VARIAN`) 
        VALUES (:nama, :harga, :stock, :foto, :deskripsi, :ukuran, :varian)");
        $statement->bindValue(':nama', $post[0]['namaproduk']);
        $statement->bindValue(':harga', $post[0]['hargaproduk']);
        $statement->bindValue(':stock', $post[0]['stockproduk']);
        $statement->bindValue(':deskripsi', $post[0]['deskripsi']);
        $statement->bindValue(':varian', $post[0]['varian']);
        $statement->bindValue(':foto', $new);
        $statement->bindValue(':ukuran', $post[0]['berat']);
        $statement->execute();
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function updateProduct($post)
{
    try {
        $img = $post[1]['fotoproduk']['name'];
        $tmp = $post[1]['fotoproduk']['tmp_name'];
        $dir = "../../gambar/produk/";
        $new = time() . $img;
        move_uploaded_file($tmp, $dir . $new);

        $statement = DB->prepare("UPDATE `barang` SET `NAMA_BARANG`=:nama,`HARGA_BARANG`=:harga,`STOCK`=:stock,`FOTO_BARANG`=:foto,`Deskripsi`=:deskripsi, `Ukuran`=:ukuran, `VARIAN` = :varian WHERE `ID_BARANG`=:id");
        $statement->bindValue(':nama', $post[0]['namaproduk']);
        $statement->bindValue(':harga', $post[0]['hargaproduk']);
        $statement->bindValue(':stock', $post[0]['stockproduk']);
        $statement->bindValue(':deskripsi', $post[0]['deskripsi']);
        $statement->bindValue(':varian', $post[0]['varian']);
        $statement->bindValue(':foto', $new);
        $statement->bindValue(':id', $post[0]['idbarang']);
        $statement->bindValue(':ukuran', $post[0]['berat']);
        $statement->execute();
    } catch (PDOException $err) {
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

function insertcart($POST)
{
    try {
        $statement = DB->prepare("INSERT INTO keranjang(ID_BARANG, ID_CUSTOMER, ID_UKURAN, ID_KATEGORI) VALUES(:idProduk, :idCust, :ukuran, :kategori)");

        $statement->bindValue(':idProduk', $_POST['idbarang']);
        $statement->bindValue(':idCust', $_SESSION['user']['ID_CUSTOMER']);
        $statement->bindValue(':ukuran', $_POST['idukuran']);
        $statement->bindValue(':kategori', $_POST['idvarian']);
        $statement->execute();

        $st = DB->prepare("UPDATE barang SET STOCK = STOCK-1 WHERE ID_BARANG = :id");
        $st->bindValue(':id',  $_POST['idbarang']);
        $st->execute();
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function pluscart($id, $ip, $ukuran)
{
    try {
        $statement = DB->prepare("INSERT INTO keranjang(ID_BARANG, ID_CUSTOMER, ID_UKURAN) VALUES(:idProduk, :idCust, :ukuran)");

        $statement->bindValue(':idProduk', $id);
        $statement->bindValue(':idCust', $ip);
        $statement->bindValue(':ukuran', $ukuran);
        $statement->execute();

        $st = DB->prepare("UPDATE barang SET STOCK = STOCK-1 WHERE ID_BARANG = :id");
        $st->bindValue(':id', $id);
        $st->execute();
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function mincart($id, $ip, $ukuran)
{
    try {
        $statement = DB->prepare("DELETE FROM keranjang WHERE ID_BARANG = :idproduk AND ID_CUSTOMER = :idCust AND ID_UKURAN = :ukuran LIMIT 1");
        $statement->bindValue(':idproduk', $id);
        $statement->bindValue(':idCust', $ip);
        $statement->bindValue(':ukuran', $ukuran);
        $statement->execute();

        $st = DB->prepare("UPDATE barang SET STOCK = STOCK + 1 WHERE ID_BARANG = :id");
        $st->bindValue(':id', $id);
        $st->execute();
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
function deletebarangdikeranjang($id, $user)
{
    try {
        $statement = DB->prepare("DELETE FROM keranjang WHERE ID_BARANG = $id AND ID_CUSTOMER = $user");
        $statement->execute();
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}


//Ambildata
function getListKeranjang($id)
{
    try {
        $statement = DB->prepare("SELECT barang.ID_BARANG, keranjang.ID_KATEGORI, kategori.NAMA_KATEGORI, barang.NAMA_BARANG, barang.HARGA_BARANG, barang.STOCK, barang.FOTO_BARANG, barang.Deskripsi, keranjang.ID_KERANJANG, keranjang.ID_UKURAN, COUNT(barang.ID_BARANG) AS Jumlah, barang.HARGA_BARANG * COUNT(barang.ID_BARANG) AS TotalHarga, SUM(ukuran_barang.BERAT) AS Berat
        FROM keranjang
        JOIN ukuran_barang ON keranjang.ID_UKURAN = ukuran_barang.ID_UKURAN
        JOIN kategori ON keranjang.ID_KATEGORI = kategori.ID_KATEGORI
        JOIN barang ON keranjang.ID_BARANG = barang.ID_BARANG 
        WHERE keranjang.ID_CUSTOMER = :id
        GROUP BY barang.ID_BARANG, ukuran_barang.ID_UKURAN, kategori.ID_KATEGORI
    ");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}


// -------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------- O R D E R / T R A N S A K S I --------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------


//Order
function Pesan($user, $total, $str_array_keranjang, $bankname, $rekening)
{
    try {
        $insert_paymethod = DB->prepare("INSERT INTO `metode_pembayaran`(`NAMA_METODE_PEMBAYARAN`, `REKENING`) VALUES (:bankname, :rekening)");
        $insert_paymethod->bindValue(':bankname', $bankname);
        $insert_paymethod->bindValue(':rekening', $rekening);
        $insert_paymethod->execute();

        $id_paymethod = DB->LastInsertId();

        $statement = DB->prepare("INSERT INTO pesanan(ID_CUSTOMER, TOTAL_ORDER, ID_METODE_PEMBAYARAN) VALUES(:idcustomer, :totalorder, :paymethod)");
        $statement->bindValue(':paymethod', $id_paymethod);
        $statement->bindValue(':idcustomer', $user);
        $statement->bindValue(':totalorder', $total);
        $statement->execute();

        $id_pesanan = DB->LastInsertId();
        $query_barang = DB->prepare("
        SELECT k.ID_CUSTOMER, k.ID_BARANG, k.ID_KATEGORI, kategori.NAMA_KATEGORI, COUNT(k.ID_BARANG) AS QTY, SUM(b.HARGA_BARANG) AS TOTAL_HARGA, ukuran_barang.BERAT * COUNT(k.ID_BARANG) AS TotalBerat
        FROM keranjang AS k
        JOIN ukuran_barang ON k.ID_UKURAN = ukuran_barang.ID_UKURAN
        JOIN kategori ON k.ID_KATEGORI = kategori.ID_KATEGORI
        JOIN barang AS b ON k.ID_BARANG = b.ID_BARANG
        WHERE k.ID_CUSTOMER = :idcustomer AND k.ID_BARANG IN (" . $str_array_keranjang . ")
        GROUP BY k.ID_CUSTOMER, k.ID_BARANG, ukuran_barang.ID_UKURAN, kategori.ID_KATEGORI;
        ");
        $query_barang->bindValue(':idcustomer', $user);
        $query_barang->execute();
        $query_barang = $query_barang->fetchAll(PDO::FETCH_ASSOC);

        foreach ($query_barang as $menu) {
            $insert_pesanan =  DB->prepare("INSERT INTO detail_pesanan(ID_BARANG, ID_ORDER, JUMLAH_PRODUK, HARGA, BERAT, ID_KATEGORI) VALUES(:id_barang, :id_order, :qty, :harga, :totalweight, :kategori)");
            $insert_pesanan->bindValue('id_barang', $menu['ID_BARANG']);
            $insert_pesanan->bindValue('id_order', $id_pesanan);
            $insert_pesanan->bindValue('qty', $menu['QTY']);
            $insert_pesanan->bindValue(':harga', $menu['TOTAL_HARGA']);
            $insert_pesanan->bindValue(':totalweight', $menu['TotalBerat']);
            $insert_pesanan->bindValue(':kategori', $menu['ID_KATEGORI']);
            $insert_pesanan->execute();
        }

        $delete_item_dikeranjang = DB->prepare("DELETE FROM keranjang WHERE ID_CUSTOMER = :idcustomer AND ID_BARANG IN (" . $str_array_keranjang . ");");
        $delete_item_dikeranjang->bindValue(':idcustomer', $user);
        $delete_item_dikeranjang->execute();
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}


// -------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------- K E L O L A    K O M E N T A R -------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------

function say_comment($POST)
{
    try {
        $statement = DB->prepare("INSERT INTO `komentar`(`ID_CUSTOMER`, `ID_BARANG`, `ISI_KOMENTAR`) VALUES (:user, :barang, :comment)");
        $statement->bindValue(":user", $POST['iduser']);
        $statement->bindValue(":barang", $POST['idbarang']);
        $statement->bindValue(":comment", $POST['komentar']);
        $statement->execute();
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
