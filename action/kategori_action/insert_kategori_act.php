<?php 

include '../../connection/connection.php';

$name = $_POST['name'];

$sql = "insert into kategori values(null, '$name')";

if($conn->query($sql) == true){
    session_start();
    $_SESSION['msg'] = 'Add Kategori Success';
    header('Location:../../pages/kategori/index.php');
}else{
    session_start();
    $_SESSION['msg_err'] = 'Add Kategori Failed';
    header('Location:../../pages/kategori/index.php');
}

?>