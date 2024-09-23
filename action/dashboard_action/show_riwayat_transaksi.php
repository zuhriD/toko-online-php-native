<?php 

include '../../connection/connection.php';

$id = $_SESSION['id'];
$sql = "SELECT transaksi.id, produk.nama as produk, transaksi.tgl_transaksi, transaksi.total_harga,  transaksi.`status` FROM transaksi
join produk on transaksi.produk_id = produk.id
where transaksi.user_id = $id";

$result = $conn->query($sql);
$no = 1;

?>