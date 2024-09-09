<?php 

include '../../connection/connection.php';

$id = $_GET['id'];

$sql = 'select * from pembayaran where id = '.$id;

$result = $conn->query($sql);

if($result->num_rows > 0 ){
    $data = $result->fetch_assoc();
}

?>