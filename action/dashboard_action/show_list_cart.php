<?php 

include '../../connection/connection.php';

$sql = "select keranjang.id as keranjang_id,produk.id, produk.nama as produk, keranjang.jml_beli, keranjang.total_harga, produk.foto_produk, produk.harga from keranjang join produk on keranjang.produk_id = produk.id";
$result = $conn->query($sql);


?>