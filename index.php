<?php
error_reporting(0);
session_start();
if ($_SESSION['status'] == 'login') {
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
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>


</head>

<body>
  <div class="container">
    <div class="forms-container">

      <div class="signin-signup">
        <form action="auth/login_log.php" method="POST" class="sign-in-form">
          <?php
          if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
              echo "<div class='alert alert-warning' role='alert'>Login gagal! username dan password salah!</div>";
            }

            if ($_GET['pesan'] == "belum_login") {
              echo "  
                        <div class='alert alert-warning' role='alert'>
                        Login terlebih dahulu!
                        </div>";
            }
          }
          ?>
          <h2 class="title">Login</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" autocomplete="off" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" autocomplete="off" />
          </div>
          <input type="submit" value="Login" class="btn solid" />
          <p class="social-text">Lupa Password?</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>



        <form action="auth/register_log.php" method="POST" class="sign-up-form">
          <?php
          include 'koneksi.php';
          $querykode = mysqli_query($sqlkoneksi, "SELECT max(id_user) as idterbesar FROM user");
          $data = mysqli_fetch_array($querykode);
          $id_user = $data['idterbesar'];
          $urutan = (int) substr($id_user, 3, 3);
          $urutan++;
          $huruf = "SMK";
          $iduser = $huruf . sprintf("%03s", $urutan);
          ?>
          <h2 class="title">Daftar</h2>
          <input type="hidden" name="id_user" class="form-control form-control-xl" value="<?php echo $iduser ?>">
          <div class="input-field">
            <i class="fas  fa-user-circle"></i>
            <input type="text" name="nama_user" placeholder="Nama" />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-transgender"></i>
            <select type="text" class="input-field-select" name="jenis_kelamin" placeholder="Jenis Kelamin">
              <option selected>Jenis Kelamin</option>
              <option value="laki-laki">Laki Laki</option>
              <option value="perempuan">Perempuan</option>
            </select>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" />
          </div>
          <div class="input-field">
            <i class="fas fa-phone"></i>
            <input type="tel" name="no_hp" pattern="^\d{12}$" placeholder="No telpon" required>
          </div>
          <input type="submit" class="btn" value="Daftar" />
          <p class="social-text">Sudah punya akun?</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Selamat Datang</h3>
          <p>
            Selamat datang di Zard Market. Silahkan untuk login terlebih dahulu jika tidak punya akun bisa daftar di bawah ini
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Daftar
          </button>
        </div>
        <div class="illustrator">
          <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
          <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_1z0fledt.json" class="image img-illustrator" background="transparent" speed="1" style="width: 120%; position:relative; bottom:120px; right: 110px; z-index: -1;" loop autoplay></lottie-player>
        </div>
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Jadilah bagian dari kami</h3>
          <p>
            Jelajahi Website Zard Market ini dengan Impian yang ingin anda beli. Silahkan Untuk membuat akun terlebih dahulu
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Masuk
          </button>
        </div>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_3mcu1lCXFW.json" class="image" background="transparent" speed="1" style="width: 100%; z-index:-1;
        position:relative; bottom: 100px;" loop autoplay></lottie-player>
      </div>
    </div>
    
  </div>
 




  <!-- Toastify -->
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="assets/js/pages/component-toasts.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
  <script src="assets/loginjs/main.js"></script>
  <script type="text/javascript">
    //toastr logout

    //get main url when session destroy
    if (sessionStorage.getItem("pesan") == "logout") {
      toastr.options = {
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "toastclass": "toast-style"

      };

      //style color toastr js
      toastr.options.toastClass = 'toast-style';
      const customStyle = document.createElement('style');
      customStyle.innerHTML = '.toast-style { background-color: #4481eb  !important; }';
      document.head.appendChild(customStyle);
      toastr.success("Anda berhasil Logout");

      sessionStorage.removeItem("pesan")
    }
    <?php
    if ($_GET['pesan'] == "register") {
      echo "toastr.success('Registrasi Berhasil')";
    }
    ?>
  </script>
  <!-- Gsap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
  <script>
    gsap.from(".container", {
      duration: 0.9,
      ease: "sine.out",
      x: -350
    });
  </script>
</body>

</html>