<?php 
session_start();
include '../koneksi.php';


$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($sqlkoneksi, "SELECT * FROM user where username='$username' AND password='$password'");
$result = mysqli_num_rows($query);

if($result > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['id_user'] = $id_user;
    $_SESSION['status'] = "login";
    header('location:../admin.php');
}else{ 
    header('location:../index.php?pesan=gagal');
}

?>