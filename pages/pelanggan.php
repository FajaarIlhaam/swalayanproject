<div class="page-heading">
  <div class="page-title mb-3">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Tabel Pelanggan</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Datatable
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

<p>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    <i class="bi bi-person-plus-fill"></i>
    </button>
</p>
<section class="section">
    <div class="collapse" id="collapseExample">
        <div class="card card-body shadow p-3 mb-5 bg-body-tertiary rounded">
            <form class="form form-horizontal" action="handlers/pelanggan.php?aksi=simpan" method="post" enctype="multipart/form-data">
                <?php
                include 'koneksi.php';
                $querykode = mysqli_query($sqlkoneksi,"SELECT max(id_pelanggan) as idterbesar FROM pelanggan");
                $data = mysqli_fetch_array($querykode);
                $id_pelanggan = $data['idterbesar'];
                $urutan = (int) substr($id_pelanggan, 3, 3);
                $urutan++;
                $huruf = "PEL";
                $idpelanggan = $huruf . sprintf("%03s", $urutan);
                ?>
                <div class="form-body">
                    <div class="">

                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="hidden" class="form-control" placeholder="ID Pelanggan" id="first-name-icon" value="<?php echo $idpelanggan ?>" readonly name="id_pelanggan">
                                    <div class="form-control-icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Nama Pelanggan</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Nama Pelanggan" id="first-name-icon" name="nama_pelanggan">
                                    <div class="form-control-icon">
                                        <i class="bi bi-box-seam"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <select class="form-control select2 input100" name="jenis_kelamin" required>
                                        <option value="">Jenis Kelamin </option>
                                        <option value="Laki-Laki">Laki - Laki </option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-gender-ambiguous"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Alamat</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                                    <div class="form-control-icon">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>No HP</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="number" class="form-control" placeholder="NO HP" name="no_hp" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-12 mb-4">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">

        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr class="text-center">
                        <th scope>#</th>
                        <th>ID Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>

                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `pelanggan` ORDER BY `pelanggan`.`id_pelanggan` DESC";
                    $query = mysqli_query($sqlkoneksi, $sql);

                    $no = 0; //variabel no


                    while ($d = mysqli_fetch_array($query)) {

                        $no++
                    ?>

                        <tr>
                            <th scope='row'><?php echo $no ?></th>

                            <td><?php echo $d['id_pelanggan'] ?></td>
                            <td><?php echo $d['nama_pelanggan'] ?></td>
                            <td><?php echo $d['jenis_kelamin'] ?></td>
                            <td><?php echo $d['alamat'] ?></td>
                            <td><?php echo $d['no_hp'] ?></td>
                            <td class="text-center">

                                <a href='' class='btn btn-outline-primary block' data-bs-toggle="modal" data-bs-target="#edit<?php echo $d['id_pelanggan'] ?>"><span data-feather='edit'></span></a> 
                                <a onclick="swalDelete('handlers/pelanggan.php?aksi=delete&id_pelanggan=<?php echo $d['id_pelanggan'] ?>')" class='badge bg-danger text-decoration-none'>
                                    <span data-feather='trash-2'></span>

                                </a>

                            </td>

                        </tr>
                    <?php } ?>
            </table>

            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($sqlkoneksi, "select * from pelanggan");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <div class="modal-primary me-1 mb-1 d-inline-block">

                    <!--primary theme Modal -->
                    <div class="modal fade text-left" id="edit<?php echo $d['id_pelanggan'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title white" id="myModalLabel133">
                                        Edit Pelanggan
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="handlers/pelanggan.php?aksi=update" method="post">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <div class="col-md-4">
                                                <label>ID Pelanggan</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="ID pelanggan" id="first-name-icon" name="id_pelanggan" value="<?php echo $d['id_pelanggan'] ?>" readonly>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-file-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Nama Pelanggan</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="nama_pelanggan" id="first-name-icon" name="nama_pelanggan" value="<?php echo $d['nama_pelanggan'] ?>" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-file-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Jenis Kelamin</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <select class="form-control select2 input100" name="jenis_kelamin" required>
                                                            <?php
                                                            if ($d['jenis_kelamin'] == 'Laki-laki') {
                                                                echo "<option value='Laki-Laki' selected>Laki-Laki</option>";
                                                                echo "<option value='Perempuan'>Perempuan</option>";
                                                            } else if ($d['jenis_kelamin'] == 'Perempuan') {
                                                                echo "<option value='Laki-Laki'>Laki-Laki</option>";
                                                                echo "<option value='Perempuan' selected>Perempuan</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-gender-ambiguous"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <label>Alamat</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="alamat" name="alamat" value="<?php echo $d['alamat'] ?>" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-lock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>No HP</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="number" class="form-control" placeholder="NO HP" name="no_hp" value="<?php echo $d['no_hp'] ?>" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-phone"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group col-md-8 offset-md-4">
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button id="insert-button" class="btn btn-primary me-1 mb-1" type="submit">Submit</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                <?php } ?>


                </div>
        </div>

        <script>
            function previewImage() {
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }

            }
        </script>

</section>