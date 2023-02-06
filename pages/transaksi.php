<div class="card">
    <section id="">
        <div class="row ">
            <div class="col-12">
                <div class="card-header">
                    <h4 class="fs-2 card-title">Data Transaksi</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="handlers/transaksi.php?aksi=simpan" method="POST" enctype="multipart/form-data">
                            <a class="btn btn-primary btn-collapse" type="button" data-bs-toggle="collapse" id="btn-collapse" href="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
                                <span>Open Form</span>
                            </a>
                            <div class="collapse mt-3" id="collapseForm">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <?php
                                            include 'koneksi.php';
                                            $querykode = mysqli_query($sqlkoneksi, "SELECT max(id_transaksi) as idterbesar FROM transaksi");
                                            $data = mysqli_fetch_array($querykode);
                                            $id_transaksi = $data['idterbesar'];
                                            $urutan = (int) substr($id_transaksi, 3, 3);
                                            $urutan++;
                                            $huruf = "TRS";
                                            $idtransaksi = $huruf . sprintf("%03s", $urutan);
                                            ?>
                                            <input type="text" id="id_transaksi" class="form-control" value="<?= $idtransaksi ?>" name="id_transaksi" hidden />
                                            <label for="pelanggan">Pelanggan</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <select id="pelanggan" class="form-control" name="id_pelanggan" required>
                                                    <option value="" selected hidden disabled>Pelanggan</option>
                                                    <?php
                                                    include 'koneksi.php';
                                                    $getpelanggan = mysqli_query($sqlkoneksi, 'select * from pelanggan');
                                                    while (
                                                        $data = mysqli_fetch_array($getpelanggan)
                                                    ) { ?>
                                                        <option value=<?= $data['id_pelanggan']; ?> selected><?= $data['nama_pelanggan']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-people-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="id_user">User</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <input type="text" id="id_user" class="form-control" value="<?php echo $_SESSION['id_user']; ?>" placeholder="ID User" name="id_user" required readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <input type="text" id="tanggal" <?php $Now = new DateTime('now', new DateTimeZone('Asia/Jakarta')); ?> value="<?php echo $Now->format('Y-m-d H:i:s'); ?>" class="form-control" placeholder="tanggal" name="tanggal" required />
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="barang">Barang</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <select name="id_barang" id="id_barang" onchange="changeValueBarang(this.value)" class="form-control">
                                                    <option value="" disabled selected=> Barang</option>
                                                    <?php
                                                    $query = mysqli_query($sqlkoneksi, "SELECT * FROM barang");
                                                    $jsBarang = "var dtBarang = new Array();\n";
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <option value="<?php echo $data['id_barang'] ?>">
                                                            <?php echo $data['nama_barang'] ?></option>
                                                        <?php $jsBarang .= "dtBarang['" . $data['id_barang'] . "'] = {harga:'" . addslashes($data['harga']) . "', stok:'" . addslashes($data['stok']) . "'};\n" ?>

                                                    <?php } ?>
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-box-fill"></i>
                                                </div>
                                            </div>
                                            <div class="keterangan d-none" id="keterangan">
                                                <span class=" ket-label">Harga : </span>
                                                <span id="harga" class=" "></span>
                                                <span class=" ket-label">Stok : </span>
                                                <span id="stok" class=" "></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <input type="number" id="jumlah" onkeyup="hitung()" class="form-control" placeholder="Jumlah" name="jumlah" required />
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="total">Total</label>
                                            <div class="form-group position-relative has-icon-left">
                                                <input type="text" id="total" class="form-control" value="" placeholder="Total" name="total" required readonly />
                                                <div class="form-control-icon">
                                                    <i class="bi bi-cart"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                        </button>
                                        <button type="reset" onclick="btnReset()" class="btn btn-light-secondary me-1 mb-1">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12 py-3 mt-3" style="border-top:1px dotted black;border-radius:2px;">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>ID Transaksi</th>
                                            <th>ID Pelanggan</th>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>User</th>

                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `v_transaksi` ORDER BY `v_transaksi`.`id_transaksi` DESC";
                                        $query = mysqli_query($sqlkoneksi, $sql);
                                        $no = 0; //variabel no
                                        while ($d = mysqli_fetch_array($query)) {
                                            $total_rupiah = number_format($d['total'], 2, ',', '.');
                                            $no++
                                        ?>

                                            <tr>
                                                <td scope='row' class="text-center"><?php echo $no ?></td>

                                                <td><?php echo $d['id_transaksi'] ?></td>
                                                <td><?php echo $d['nama_pelanggan'] ?></td>
                                                <td><?php echo $d['tanggal'] ?></td>
                                                <td><?php echo $d['nama_barang'] ?></td>
                                                <td><?php echo $d['jumlah'] ?></td>
                                                <td>Rp.<?php echo $total_rupiah ?></td>
                                                <td><?php echo $d['nama_user'] ?></td>
                                                <td class="text-center">
                                                    <a href="admin.php?pages=laporan_transaksi" class="badge bg-primary text-decoration-none">
                                                    <span data-feather='printer'></span> 
                                                    </a>
                                                    <a onclick="swalButton('handlers/transaksi.php?aksi=delete&id_transaksi=<?php echo $d['id_transaksi'] ?>')" class='badge bg-danger text-decoration-none'>
                                                        <span data-feather='trash-2'></span>
                                                    </a>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>

<script>
    function btnReset() {
        document.getElementbyId("form").reset()
    }

    function hitung() {
        let harga = document.getElementById('harga').innerHTML;
        var jumlah = document.getElementById('jumlah').value;
        const hargaRemoveRupiah = harga.replace(/[^0-9]/g, "")
        const hargaInt = parseInt(hargaRemoveRupiah);
        const total = hargaInt * jumlah;
        document.getElementById('total').value = total;
    }

    function totalRp() {
        formatRupiah(document.getElementById('total').value);
    }
    <?php echo $jsBarang; ?>

    function RpTabel() {
        const total = document.getElementById('total-tabel').innerHTML
        formatRupiah(total, "Rp. ")
    }

    function changeValueBarang(x) {
        document.getElementById('keterangan').classList.remove('d-none');
        document.getElementById('harga').innerHTML = dtBarang[x].harga, "Rp.";
        document.getElementById('stok').innerHTML = dtBarang[x].stok;
    }
</script>