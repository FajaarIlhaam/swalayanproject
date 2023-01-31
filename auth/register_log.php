<?php 
include "../koneksi.php";

$id_user = $_POST['id_user'];
$nama_user = $_POST['nama_user'];
$jk = $_POST['jenis_kelamin'];
$username = $_POST['username'];
$password = $_POST['password'];
$nohp = $_POST['no_hp'];


$result = mysqli_query($sqlkoneksi, "INSERT INTO user VALUES('$id_user', '$nama_user', '$jk', '$username', '$password', '$nohp')");

header("location:../index.php?pesan=register");
?>