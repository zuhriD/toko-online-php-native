<?php 

include '../../connection/connection.php';

$name = $_POST['name'];

$sql = "insert into pembayaran values(null, '$name')";

if($conn->query($sql) == true){
    session_start();
    $_SESSION['msg'] = 'Add pembayaran Success';
    header('Location:../../pages/pembayaran/index.php');
}else{
    session_start();
    $_SESSION['msg_err'] = 'Add pembayaran Failed';
    header('Location:../../pages/pembayaran/index.php');
}

?>