<?php 

include '../../connection/connection.php';
session_start();

$id = $_GET['id'];

$sql = "DELETE FROM produk WHERE id = ".$id;

if ($conn->query($sql) === TRUE) {
    $_SESSION['msg'] = "Data Berhasil Dihapus";
    header('Location: ../../pages/produk/index.php');
} else {
    $_SESSION['msg_err'] = "Data Gagal Dihapus";
    header('Location: ../../pages/produk/index.php');

}

?>