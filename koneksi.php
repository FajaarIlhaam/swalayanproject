<?php 
//Koneksi

$sqlkoneksi = mysqli_connect("localhost", "root", "", "dbswalayan");

if(!$sqlkoneksi) {
    die("Gagal Terhubung ke database" + mysqli_connect_error());
}


?>