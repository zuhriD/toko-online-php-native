<?php 

include '../../connection/connection.php';
session_start();

$user_id = $_SESSION['id'];
$produk_id = $_POST['id'];
$pembayaran = $_POST['pembayaran'];
$tgl_transaksi = date('Y-m-d');
$alamat_lengkap = $_POST['address'] + ", " + $_POST['city'] + ", " + $_POST['province'] + ", " + $_POST['postal_code'];
$no_hp= $_POST['phone'];
$total_harga = $_POST['total_harga'];
$status = 1;

$insertData = "insert into transaksi values(null,'$user_id','$produk_id','$pembayaran','$tgl_transaksi','$alamat_lengkap','$no_hp','$total_harga','$status')";
$result = $conn->query($insertData);
if($result == true){
    $transaksi_id = $conn->insert_id;
    $produkId = $_POST['produkId'];
    

}else{
    $_SESSION['msg_err'] = "Data Gagal Ditambahkan";
}

?>