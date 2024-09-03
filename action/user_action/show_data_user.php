<?php 
    include '../../connection/connection.php';

    $query = "SELECT * FROM user";

    $result = mysqli_query($conn, $query);

    $no = 1;
    if($result->num_rows < 0){
        echo "Data tidak ada";
    }

?>