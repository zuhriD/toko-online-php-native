<?php 

include '../../connection/connection.php';
session_start();
$user_id = $_SESSION['id'];
$produk_id = $_POST['id'];
$qty = $_POST['qty'];
$total_harga = intval($_POST['harga']) * intval($qty);

$insertData = "insert into keranjang values(null,'$user_id','$produk_id','$qty','$total_harga')";

$searchData = "select * from keranjang where produk_id = '$produk_id' and user_id = '$user_id'";
$check = $conn->query($searchData);

if($check->num_rows > 0){
    $data = mysqli_fetch_assoc($check);
    $newQty = $data['jml_beli'] + $qty;
    $newTotal = $data['total_harga'] + $total_harga;
    $updateData = "update keranjang set jml_beli = $newQty, total_harga = $newTotal where produk_id = '$produk_id' and user_id = '$user_id'";
    $conn->query($updateData);
    if($conn->query($updateData) == true){
        header('Location: ../../pages/home/cart.php');
    }else{
        $_SESSION['msg_err'] = "Data Gagal Ditambahkan";
    }
}else{
    $result = $conn->query($insertData);
    if($result == true){
        header('Location: ../../pages/home/cart.php');
    }else{
        $_SESSION['msg_err'] = "Data Gagal Ditambahkan";
    }
}



?>