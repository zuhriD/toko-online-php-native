<?php 

include '../../connection/connection.php';

$id = $_POST['id'];
$name = $_POST['name'];

$sql = "UPDATE pembayaran SET nama = '$name' WHERE id = ".$id;

$result = $conn->query($sql);

if($result == true){
    session_start();
    $_SESSION['msg'] = 'Update pembayaran Success';
    header('Location:../../pages/pembayaran/index.php');
}else{
    session_start();
    $_SESSION['msg_err'] = 'Update pembayaran Failed';
    header('Location:../../pages/pembayaran/index.php');
}

?>