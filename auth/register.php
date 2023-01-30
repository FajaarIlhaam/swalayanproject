<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Swalayan</title>
    <link rel="stylesheet" href="../assets/css/main/app.css">
    <link rel="stylesheet" href="../assets/css/pages/auth.css">
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
  rel="stylesheet"
/>
    <link rel="stylesheet" href="../style.css">
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
</head>

<body >
    <div id="auth">
<div class="row h-100 d-flex justify-content-center align-items-center">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h1 class="auth-title d-flex justify-content-center">Register</h1>
            <form action="register_log.php" method="POST">

            <?php 
                 include '../koneksi.php';
                 $querykode = mysqli_query($sqlkoneksi, "SELECT max(id_user) as idterbesar FROM user");
                 $data = mysqli_fetch_array($querykode);
                 $id_user = $data['idterbesar'];
                 $urutan = (int) substr($id_user, 3, 3);
                 $urutan++;
                 $huruf = "SMK7";
                 $iduser = $huruf . sprintf("%03s", $urutan);
            ?>
             <div class="form-group position-relative has-icon-left mb-4">
                <input type="hidden" name="id_user" class="form-control form-control-xl" value="<?php echo $iduser?>" >
            </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" name="nama_user" class="form-control form-control-xl" placeholder="Nama">
                           <div class="form-control-icon">
                                <i class="bi bi-person"></i>
        </div>
     </div>
                <div class="form-group position-relative has-icon-left mb-4">
                        <select type="text" class="form-control form-control-xl" name="jenis_kelamin" placeholder="Jenis Kelamin">
                           <option selected>Jenis Kelamin</option>
                              <option value="laki-laki">Laki Laki</option>
                                <option value="perempuan">Perempuan</option>
                </select>
                    <div class="form-control-icon">
                       <i class="bi bi-gender-ambiguous"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
                        <div class="form-control-icon">
                           <i class="bi bi-person"></i>
                </div>
        </div>
                <div class="form-group position-relative has-icon-left mb-4">
                      <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                          <div class="form-control-icon">
                              <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="tel" name="no_hp" pattern="^\d{12}$" class="form-control form-control-xl" placeholder="No telpon" required>
                    <div class="form-control-icon">
                    <i class="bi bi-phone"></i>
                    </div>
                </div>
                <button class="btn btn-white btn-block btn-lg shadow mt-5">Daftar</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">Sudah mempunyai akun?</p>
                <a href="../index.php" class="font-bold text-black">Log in</a>
            </div>
        </div>
    </div>

</div>
    </div>

    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
></script>

  <!-- Gsap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>

<script>
    gsap.from('#auth',{duration: 1.5, ease:'slow(0.7, 0.7, false)',y:'-100%'});
</script>

</body>
</html>
