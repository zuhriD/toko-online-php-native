<?php 

include '../../connection/connection.php';

$id = $_POST['id'];

$sql = "SELECT transaksi.id, user.nama AS pembeli,transaksi.no_hp, pembayaran.nama AS pembayaran, tgl_transaksi, alamat, total_harga, transaksi.`status`
FROM transaksi
JOIN user ON transaksi.user_id = user.id
JOIN pembayaran ON transaksi.pembayaran_id = pembayaran.id
where transaksi.id = ".$id;

$result = $conn->query($sql);

if($result->num_rows > 0 ){
    $data = $result->fetch_assoc();
    echo json_encode($data);
}

?>