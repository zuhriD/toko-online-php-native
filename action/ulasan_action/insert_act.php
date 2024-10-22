<?php 

include '../../connection/connection.php';
session_start();

$ulasan = $_POST['ulasan'];
$id_user = $_SESSION['id'];
$id_produk = $_POST['produk_id'];
$rating = $_POST['rating'];
$foto_ulasan = $_FILES['foto_ulasan']['name'];

if(isset($_FILES['foto_ulasan'])){
    $foto_ulasan = $_FILES['foto_ulasan']['name'];
    $tmp = $_FILES['foto_ulasan']['tmp_name'];
    $path = "../../assets/images/ulasan/".$foto_ulasan;
    move_uploaded_file($tmp, $path);
}else{  
    $foto_ulasan = '';
}

$query = "INSERT INTO ulasan VALUES (null, $id_produk,$id_user, '$ulasan', $rating, '$foto_ulasan')";
$hasil = $conn->query($query);

if($hasil){
    $_SESSION['msg'] = 'Ulasan berhasil ditambahkan';
    header('Location: ../../pages/home/detail_produk.php?id='.$id_produk);
}else{
    $_SESSION['msg_err'] = 'Ulasan gagal ditambahkan';
    header('Location: ../../pages/home/detail_produk.php?id='.$id_produk);
}



?>