<?php 
// untuk menggabungkan file connection.php
include '../connection/connection.php';

// get data from formnya
$username = $_POST['username'];
$password = $_POST['password'];

// action for check data from database
$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

$result = $conn->query($sql);

if($result->num_rows > 0){
    echo "<script>alert('Login Success');</script>";
    echo "<script>location.href = '../pages/dashboard_view.php';</script>";
}else{
    session_start();
    $_SESSION['message'] = "Username or Password is wrong";
    return header('location: ../pages/login_view.php');
}
?>