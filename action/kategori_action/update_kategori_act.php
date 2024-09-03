<?php 

include '../../connection/connection.php';

$id = $_POST['id'];
$name = $_POST['name'];

$sql = "UPDATE kategori SET nama = '$name' WHERE id = ".$id;

$result = $conn->query($sql);

if($result == true){
    session_start();
    $_SESSION['msg'] = 'Update Kategori Success';
    header('Location:../../pages/kategori/index.php');
}else{
    session_start();
    $_SESSION['msg_err'] = 'Update Kategori Failed';
    header('Location:../../pages/kategori/index.php');
}

?>