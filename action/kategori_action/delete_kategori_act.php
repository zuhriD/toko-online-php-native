<?php 

include '../../connection/connection.php';

$id = $_GET['id'];

$sql = 'delete from kategori where id = '.$id;

if($conn->query($sql) == true){
    session_start();
    $_SESSION['msg'] = 'Delete Kategori Success';
    header('Location:../../pages/kategori/index.php');
}else{
    session_start();
    $_SESSION['msg_err'] = 'Delete Kategori Failed';
    header('Location:../../pages/kategori/index.php');
}



?>