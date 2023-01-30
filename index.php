<?php 
error_reporting(0);
session_start();
if($_SESSION['status'] == 'login') {
    header("location:admin.php");
}
?>

<?php
error_reporting(0);
session_start();
if ($_SESSION['status'] == "login") {
    header("location:admin.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Swalayan</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="stylesheet" href="style.css">
</head>

<body >
    <div id="auth">
<div class="row h-100 d-flex justify-content-center align-items-center">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h1 class="auth-title d-flex justify-content-center">Login</h1>
            
            <?php 
                 if(isset($_GET['pesan'])){
                    if($_GET['pesan'] == "gagal"){
                        echo "<div class='alert alert-warning' role='alert'>Login gagal! username dan password salah!</div>";
                    }
                    if($_GET['pesan'] == "logout"){
                        echo "  
                        <div class='alert alert-success' role='alert'>
                        Anda telah berhasil logout
                        </div>";    
                    }
                    if($_GET['pesan'] == "belum_login"){
                        echo "  
                        <div class='alert alert-warning' role='alert'>
                        Login terlebih dahulu!
                        </div>";    
                    }
                }  
                ?>
            
            <form action="auth/login_log.php" method="POST">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" name="username" placeholder="Username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-white btn-block btn-lg shadow mt-5">Log in</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">Tidak mempunyai akun?</p>
                <a href="auth/register.php" class="font-bold text-black">Daftar</a>
            </div>
        </div>
    </div>

</div>
    </div>



    <!-- Gsap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>

    <script>
        gsap.from('#auth',{duration: 1.5, ease:'slow(0.7, 0.7, false)',y:'-100%'});
    </script>
</body>
</html>
