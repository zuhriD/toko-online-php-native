<?php

include '../../connection/connection.php';

$query = "SELECT transaksi.id, user.nama AS pembeli, pembayaran.nama AS pembayaran,
no_hp, tgl_transaksi, alamat, total_harga, transaksi.`status`
FROM transaksi
JOIN user ON transaksi.user_id = user.id
JOIN pembayaran ON transaksi.pembayaran_id = pembayaran.id
";

$result = mysqli_query($conn, $query);

$no = 1;

if ($result->num_rows < 0) {
    echo "Data tidak ada";
}
