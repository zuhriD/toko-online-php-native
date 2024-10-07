<?php 

include '../../connection/connection.php';
session_start();

$id = $_POST['id'];
$nama = $_POST['name'];
$kategori = $_POST['kategori_id'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$foto = $_FILES['foto_produk']['name'];
$stok = $_POST['stok_produk'];

if ($_FILES['foto_produk']) {
    $nama_file = $_FILES['foto_produk']['name'];
    $source = $_FILES['foto_produk']['tmp_name'];
    $folder = 'D:\Kuliah\SM4\PEMWEB\laragon\www\toko_online\assets\images\produk\\';

    move_uploaded_file($source, $folder . $nama_file);
    $sql = "UPDATE produk SET kategori_id = '$kategori', nama = '$nama', harga = '$harga', deskripsi = '$deskripsi', foto_produk = '$foto', stok_produk = '$stok' WHERE id = ".$id;
}else{
    $sql = "UPDATE produk SET kategori_id = '$kategori', nama = '$nama', harga = '$harga', deskripsi = '$deskripsi', stok_produk = '$stok' WHERE id = ".$id;
}


if ($conn->query($sql) === TRUE) {
    $_SESSION['msg'] = "Data Berhasil Diupdate";
    header('Location: ../../pages/produk/index.php');
} else {
    $_SESSION['msg_err'] = "Data Gagal Diupdate";
    header('Location: ../../pages/produk/index.php');

}


?>