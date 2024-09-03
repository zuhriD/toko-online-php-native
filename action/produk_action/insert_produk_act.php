<?php

include '../../connection/connection.php';
session_start(); 

$nama = $_POST['name'];
$kategori = $_POST['kategori_id'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$foto_produk = $_FILES['foto_produk']['name'];
$stok = $_POST['stok'];

if ($_FILES['foto_produk']) {
    $nama_file = $_FILES['foto_produk']['name'];
    $source = $_FILES['foto_produk']['tmp_name'];
    $folder = 'D:\Kuliah\SM4\PEMWEB\laragon\www\toko_online\assets\images\produk\\';

    move_uploaded_file($source, $folder . $nama_file);
}

$sql = "INSERT INTO produk VALUES (null,'$kategori','$nama', '$harga', '$deskripsi', '$foto_produk', '$stok')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['msg'] = "Data Berhasil Ditambahkan";
    header('Location: ../../pages/produk/index.php');
} else {
    $_SESSION['msg_err'] = "Data Gagal Ditambahkan";
    header('Location: ../../pages/produk/index.php');

}
