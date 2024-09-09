<?php 

include '../../connection/connection.php';

$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE transaksi SET status = $status WHERE id = $id";

if($conn->query($sql) === TRUE){
    session_start();
    $_SESSION['msg'] = 'Update Status Success';
    header('Location:../../pages/transaksi/index.php');
}else{
    session_start();
    $_SESSION['msg_err'] = 'Update Status Failed';
    header('Location:../../pages/transaksi/index.php');
}

?>