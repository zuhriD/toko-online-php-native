<?php 

include '../../connection/connection.php';
session_start();

$id = $_GET['id'];

$sql = "DELETE FROM keranjang WHERE id = ".$id;

if ($conn->query($sql) === TRUE) {
    $_SESSION['msg'] = "Data Berhasil Dihapus";
    header('Location: ../../pages/home/cart.php');
} else {
    $_SESSION['msg_err'] = "Data Gagal Dihapus";
    header('Location: ../../pages/home/cart.php');

}


?>