<?php 

include '../../connection/connection.php';

$id = $_GET['id'];

$sql = 'delete from pembayaran where id = '.$id;

if($conn->query($sql) == true){
    session_start();
    $_SESSION['msg'] = 'Delete pembayaran Success';
    header('Location:../../pages/pembayaran/index.php');
}else{
    session_start();
    $_SESSION['msg_err'] = 'Delete pembayaran Failed';
    header('Location:../../pages/pembayaran/index.php');
}



?>