<?php 

include '../../connection/connection.php';

// MEmbuat query untuk menampilkan data kategori
$sql = "SELECT * FROM kategori";

// Menjalankan querynya dengan memanggil variabel conn
$result = $conn->query($sql);

if($result->num_rows > 0){
    // ubah result menjadi array assosiatif dengan memanggil function fetch_assoc
    
}else{
    echo "Data tidak ada";
}

?>