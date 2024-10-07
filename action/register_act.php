<?php 
// untuk menggabungkan file connection.php
include '../connection/connection.php';

// get data from formnya
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// action for insert data to database
$sql = "INSERT INTO user VALUES (null,'$name', '$email', '$username', '$password', 2)";

if($conn->query($sql) == true){
    echo "<script>alert('Register Success');</script>";
    echo "<script>location.href = '../pages/login_view.php';</script>";
}else{
    echo "<script>alert('Register Failed');</script>";
    echo "<script>location.href = '../pages/register_view.php';</script>";
}

?>