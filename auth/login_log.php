<?php 
session_start();
include '../koneksi.php';


$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($sqlkoneksi, "SELECT * FROM user where username='$username' AND password='$password'");
$getiduser = mysqli_fetch_array(mysqli_query($sqlkoneksi, "SELECT id_user FROM user where username='$username'"));
$result = mysqli_num_rows($query);

if($result > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['id_user'] = $getiduser[0];
    $_SESSION['status'] = "login";
    header('location:../admin.php');
}else{ 
    header('location:../index.php?pesan=gagal');
}

?>