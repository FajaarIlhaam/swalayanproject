<?php
include '../koneksi.php';

$aksi = $_GET['aksi'];
switch($aksi){
  
  case 'simpan':
    $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_hp = $_POST['no_hp'];
    $query = mysqli_query($sqlkoneksi, "INSERT INTO user VALUES('$id_user','$nama_user','$jenis_kelamin','$username','$password','$no_hp')");
    if ($query) {
      session_start();
      $_SESSION['simpanUser'] = "sukses";
      echo '
      <script>
      window.location.href = "../index.php?pages=user";
      </script>'
    }
    break;

  case 'update':
    $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_hp = $_POST['no_hp'];
    $query = mysqli_query($sqlkoneksi,"UPDATE user SET nama_user = '$nama_user', jenis_kelamin = '$jenis_kelamin',
    username = '$username', password = '$password', no_hp = '$no_hp' WHERE id_user = '$id_user'");
    header("location:../admin.php?pages=user");
    break
    ;
  case 'delete':
    $id_user = $_GET['id_user'];
    $query = mysqli_query($sqlkoneksi,"DELETE FROM user WHERE id_user = '$id_user'");
    header("location:../admin.php?pages=user");
    break;
  }
?>