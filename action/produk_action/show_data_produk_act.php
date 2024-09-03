<?php 

include '../../connection/connection.php';

$query = "SELECT produk.id, produk.nama, kategori.nama as kategori, produk.harga, produk.deskripsi, produk.foto_produk, produk.stok_produk FROM produk JOIN kategori ON produk.kategori_id = kategori.id";

$result = $conn->query($query);


?>