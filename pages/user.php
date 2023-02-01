<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Tabel User</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Datatable
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- Basic Tables start -->
  <section class="section">
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        <button type="button" style="width: 35px;" class="btn btn-primary btn-sm float-end mx-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
          +
        </button>
        <div class="table-responsive">
          <table class="table" id="table1">
            <thead>
              <tr>
                <th class="text-center">ID User</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Username</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">No hp</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "koneksi.php";
              $query = mysqli_query($sqlkoneksi, "SELECT * FROM user");

              while ($r = mysqli_fetch_array($query)) {
              ?>
                <tr class="text-center">
                  <td><?php echo $r['id_user']; ?></td>
                  <td><?php echo $r['nama_user']; ?></td>
                  <td><?php echo $r['username']; ?></td>
                  <td><?php echo $r['jenis_kelamin']; ?></td>
                  <td><?php echo $r['no_hp']; ?></td>
                  <td class="text-center">

                    <!-- Button Modal -->
                    <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#default<?php echo $r['id_user']; ?>">
                      <i class="bi bi-pencil-square"></i>
                    </button>
                    <!--Modal Form Edit -->
                    <div class="modal fade text-left" id="default<?php echo $r['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">
                              Edit User
                            </h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                              <i data-feather="x"></i>
                            </button>
                          </div>
                          <form action="handlers/user.php?aksi=update" method="post">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                      <input type="hidden" class="form-control" name="id_user" value="<?php echo $r['id_user'] ?>" id="first-name-icon" />
                                      <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                          <input type="text" class="form-control" placeholder="Nama" name="nama_user" value="<?php echo $r['nama_user'] ?>" id="first-name-icon" />
                                          <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-md-12">
                                      <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                          <select type="text" class="form-control" name="jenis_kelamin" placeholder="Jenis Kelamin">
                                            <?php
                                            if ($r['jenis_kelamin'] == 'laki-laki') {
                                              echo "<option value='laki-laki' selected>Laki-Laki</option>";
                                              echo "<option value='perempuan'>Perempuan</option>";
                                            } else {
                                              echo "<option value='laki-Laki'>Laki-Laki</option>";
                                              echo "<option value='perempuan' selected>Perempuan</option>";
                                            }
                                            ?>
                                          </select>
                                          <div class="form-control-icon">
                                            <i class="bi bi-gender-ambiguous"></i>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-md-12">
                                      <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                          <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $r['username'] ?>" id="first-name-icon" />
                                          <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-md-12">
                                      <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                          <input type="password" class="form-control" name="password" value="<?php echo $r['password'] ?>" placeholder="Password" readonly />

                                          <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-md-12">
                                      <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                          <input type="text" class="form-control" name="no_hp" placeholder="No hp" value="<?php echo $r['no_hp'] ?>" />

                                          <div class="form-control-icon">
                                            <i class="bi bi-phone"></i>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group col-md-8 offset-md-4">
                                      <div class="form-check">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="reset" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                      <i class="bx bx-x d-block d-sm-none"></i>
                                      <span class="d-none d-sm-block">Batal</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                      <i class="bx bx-check d-block d-sm-none"></i>
                                      <span class="d-none d-sm-block">Simpan</span>
                                    </button>
                          </form>
                        </div>
                      </div>
                    </div>
        </div>
      </div>
    </div>
</div>
<a href="handlers/user.php?aksi=delete&id_user=<?php echo $r['id_user'] ?>" class="btn btn-danger">
  <i class="bi bi-trash3"></i>
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</section>
<!-- button trigger for  Vertically Centered modal -->

<!-- Vertically Centered modal Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">
          Tambah User
        </h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
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
      <form action="handlers/user.php?aksi=simpan" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group has-icon-left">
                <div class="position-relative">
                  <input type="hidden" class="form-control" name="id_user" value="<?php echo $iduser ?>" id="first-name-icon" />
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control" placeholder="Nama" name="nama_user" id="first-name-icon" />
                      <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <select type="text" class="form-control" name="jenis_kelamin" placeholder="Jenis Kelamin">
                        <option selected>Jenis Kelamin</option>
                        <option value="laki-laki">Laki Laki</option>
                        <option value="perempuan">Perempuan</option>
                      </select>
                      <div class="form-control-icon">
                        <i class="bi bi-gender-ambiguous"></i>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control" name="username" placeholder="Username" id="first-name-icon" />
                      <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="password" class="form-control" name="password" placeholder="Password" />

                      <div class="form-control-icon">
                        <i class="bi bi-lock"></i>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control" name="no_hp" placeholder="No hp" />

                      <div class="form-control-icon">
                        <i class="bi bi-phone"></i>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-8 offset-md-4">
                  <div class="form-check">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-light-secondary" data-bs-dismiss="modal">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Batal</span>
                </button>
                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                  <i class="bx bx-check d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Simpan</span>
                </button>
      </form>
    </div>
  </div>
</div>
</div>
</div>