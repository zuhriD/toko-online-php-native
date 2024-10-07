<?php 

include '../../connection/connection.php';
$id = $_SESSION['id'];
$sql = "SELECT SUM(transaksi.total_harga) AS pengeluaran_bulan_ini
FROM transaksi
WHERE MONTH(tgl_transaksi) = MONTH(NOW()) 
AND transaksi.user_id = $id
AND transaksi.`status` = 2
";


$result = $conn->query($sql);

if($result->num_rows > 0){
    // Fetch the count result properly
    $cart = $conn->query('SELECT COUNT(*) AS cart FROM keranjang WHERE user_id =' . $id);

    if ($cart && $cart->num_rows > 0) {
        $c = $cart->fetch_assoc();
        // Convert the count to string
        $_SESSION['cart'] = strval($c['cart']);
    } else {
        $_SESSION['cart'] = '0'; // In case the query returns no rows
    }
    $data = $result->fetch_assoc();
}


?>