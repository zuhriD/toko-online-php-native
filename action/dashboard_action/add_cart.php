<?php 

include '../../connection/connection.php';
session_start();
$user_id = $_SESSION['id'];
$produk_id = $_POST['id'];
$qty = $_POST['qty'];
$total_harga = intval($_POST['harga']) * intval($qty);

$sql = "insert into keranjang values(null,'$user_id','$produk_id','$qty','$total_harga')";

$result = $conn->query($sql);
if($result == true){
    header('Location: ../../pages/home/cart.php');
}else{
    $_SESSION['msg_err'] = "Data Gagal Ditambahkan";
    
}

?>