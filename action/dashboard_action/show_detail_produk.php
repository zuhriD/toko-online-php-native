<?php 

include '../../connection/connection.php';

$id = $_GET['id'];
$sql = "SELECT produk.id, produk.nama, kategori.nama as kategori, produk.kategori_id, produk.harga, produk.deskripsi, produk.foto_produk, produk.stok_produk FROM produk JOIN kategori ON produk.kategori_id = kategori.id where produk.id = ".$id;

$result = $conn->query($sql);
if($result->num_rows > 0){
    $data = $result->fetch_assoc();
}

?>